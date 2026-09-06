#!/usr/bin/env python3
"""
Scraper WordPress + WooCommerce vers JSON + images. Domaine source via $SOURCE_SITE.

Utilise l'API publique "Store API" de WooCommerce (lecture seule, aucune clé
requise) pour récupérer :
  - toutes les catégories de produits
  - tous les produits avec l'ensemble de leurs détails
  - toutes les images de chaque produit (téléchargées sur le disque)

Sortie (dossier ./output) :
  output/
    categories.json                 -> liste des catégories (prête pour la BD)
    products.json                   -> liste des produits (prête pour la BD)
    product_category.json           -> table pivot produit <-> catégorie
    database.json                   -> les 3 ensembles réunis dans un seul fichier
    images/
      <slug-categorie>/
        <slug-produit>/
          01.jpg, 02.jpg, ...       -> images du produit
          _images.json              -> métadonnées des images de ce produit

Usage :
    python3 scraper.py
    python3 scraper.py --no-images        # ne télécharge pas les fichiers images
    python3 scraper.py --out ./mon_dossier
"""

from __future__ import annotations

import argparse
import json
import mimetypes
import os
import re
import sys
import time
from html import unescape
from pathlib import Path
from urllib.parse import urlparse

import requests

BASE_URL = os.environ.get("SOURCE_SITE", "").rstrip("/")   # ex: SOURCE_SITE=https://mon-site
STORE_API = f"{BASE_URL}/wp-json/wc/store/v1"
PER_PAGE = 100
REQUEST_TIMEOUT = 60
RETRIES = 3
SLEEP_BETWEEN = 0.3  # politesse entre les requêtes

SESSION = requests.Session()
# Le site filtre les requêtes : il faut un User-Agent de navigateur classique.
SESSION.headers.update(
    {
        "User-Agent": (
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
            "(KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36"
        ),
        "Accept": "application/json, text/plain, */*",
        "Accept-Language": "es-ES,es;q=0.9,fr;q=0.8,en;q=0.7",
        "Referer": f"{BASE_URL}/",
    }
)


# --------------------------------------------------------------------------- #
# Helpers
# --------------------------------------------------------------------------- #
def log(msg: str) -> None:
    print(msg, flush=True)


def slugify(value: str, fallback: str = "item") -> str:
    value = unescape(value or "").strip().lower()
    value = re.sub(r"[^\w\s-]", "", value, flags=re.UNICODE)
    value = re.sub(r"[\s_-]+", "-", value).strip("-")
    return value or fallback


def strip_html(html: str) -> str:
    """Version texte brut d'un fragment HTML (pour un champ 'plain')."""
    text = re.sub(r"<[^>]+>", " ", html or "")
    text = unescape(text)
    return re.sub(r"\s+", " ", text).strip()


def get_json(url: str, params: dict | None = None):
    last_err = None
    for attempt in range(1, RETRIES + 1):
        try:
            resp = SESSION.get(url, params=params, timeout=REQUEST_TIMEOUT)
            resp.raise_for_status()
            return resp
        except requests.RequestException as exc:  # noqa: PERF203
            last_err = exc
            log(f"  ! tentative {attempt}/{RETRIES} échouée pour {url} : {exc}")
            time.sleep(2 * attempt)
    raise RuntimeError(f"Impossible de récupérer {url} : {last_err}")


def paginated(endpoint: str, extra_params: dict | None = None):
    """Itère sur toutes les pages d'un endpoint de la Store API."""
    page = 1
    while True:
        params = {"per_page": PER_PAGE, "page": page}
        if extra_params:
            params.update(extra_params)
        resp = get_json(f"{STORE_API}/{endpoint}", params=params)
        batch = resp.json()
        if not batch:
            break
        for item in batch:
            yield item
        total_pages = int(resp.headers.get("X-WP-TotalPages", "1") or 1)
        if page >= total_pages:
            break
        page += 1
        time.sleep(SLEEP_BETWEEN)


def price_to_decimal(amount: str | None, minor_unit: int) -> float | None:
    if amount is None or amount == "":
        return None
    try:
        return round(int(amount) / (10 ** minor_unit), minor_unit)
    except (ValueError, TypeError):
        return None


# --------------------------------------------------------------------------- #
# Catégories
# --------------------------------------------------------------------------- #
def fetch_categories() -> list[dict]:
    log("→ Récupération des catégories…")
    categories = []
    for cat in paginated("products/categories"):
        categories.append(
            {
                "id": cat.get("id"),
                "name": unescape(cat.get("name") or ""),
                "slug": cat.get("slug"),
                "parent_id": cat.get("parent") or None,
                "description": strip_html(cat.get("description") or ""),
                "product_count": cat.get("count"),
                "image": (cat.get("image") or {}).get("src") if cat.get("image") else None,
                "permalink": cat.get("permalink"),
            }
        )
    log(f"  {len(categories)} catégories trouvées.")
    return categories


# --------------------------------------------------------------------------- #
# Produits
# --------------------------------------------------------------------------- #
def normalize_product(raw: dict) -> dict:
    prices = raw.get("prices") or {}
    minor = int(prices.get("currency_minor_unit", 2) or 2)

    images = []
    for idx, img in enumerate(raw.get("images") or [], start=1):
        images.append(
            {
                "position": idx,
                "wp_id": img.get("id"),
                "src": img.get("src"),
                "thumbnail": img.get("thumbnail"),
                "name": unescape(img.get("name") or ""),
                "alt": unescape(img.get("alt") or ""),
                "local_path": None,  # rempli lors du téléchargement
            }
        )

    attributes = []
    for attr in raw.get("attributes") or []:
        attributes.append(
            {
                "name": unescape(attr.get("name") or ""),
                "taxonomy": attr.get("taxonomy"),
                "terms": [unescape(t.get("name") or "") for t in attr.get("terms") or []],
            }
        )

    return {
        "id": raw.get("id"),
        "name": unescape(raw.get("name") or ""),
        "slug": raw.get("slug"),
        "sku": raw.get("sku") or None,
        "type": raw.get("type"),
        "parent_id": raw.get("parent") or None,
        "permalink": raw.get("permalink"),
        "short_description_html": raw.get("short_description") or "",
        "short_description": strip_html(raw.get("short_description") or ""),
        "description_html": raw.get("description") or "",
        "description": strip_html(raw.get("description") or ""),
        "on_sale": raw.get("on_sale"),
        "price": price_to_decimal(prices.get("price"), minor),
        "regular_price": price_to_decimal(prices.get("regular_price"), minor),
        "sale_price": price_to_decimal(prices.get("sale_price"), minor),
        "currency": prices.get("currency_code"),
        "average_rating": raw.get("average_rating"),
        "review_count": raw.get("review_count"),
        "is_in_stock": raw.get("is_in_stock"),
        "is_purchasable": raw.get("is_purchasable"),
        "stock_availability": (raw.get("stock_availability") or {}).get("text"),
        "low_stock_remaining": raw.get("low_stock_remaining"),
        "weight": raw.get("weight") or None,
        "dimensions": raw.get("dimensions") or None,
        "brands": [unescape(b.get("name") or "") for b in raw.get("brands") or []],
        "tags": [unescape(t.get("name") or "") for t in raw.get("tags") or []],
        "attributes": attributes,
        "category_ids": [c.get("id") for c in raw.get("categories") or []],
        "categories": [
            {"id": c.get("id"), "name": unescape(c.get("name") or ""), "slug": c.get("slug")}
            for c in raw.get("categories") or []
        ],
        "variation_ids": [v.get("id") for v in raw.get("variations") or []],
        "images": images,
    }


def fetch_products() -> list[dict]:
    log("→ Récupération des produits…")
    products = [normalize_product(p) for p in paginated("products")]
    log(f"  {len(products)} produits trouvés.")
    return products


# --------------------------------------------------------------------------- #
# Avis clients (reviews)
# --------------------------------------------------------------------------- #
def fetch_reviews() -> list[dict]:
    log("→ Récupération des avis clients…")
    reviews = []
    for r in paginated("products/reviews"):
        reviews.append(
            {
                "id": r.get("id"),
                "product_id": r.get("product_id"),
                "reviewer": unescape(r.get("reviewer") or ""),
                "review_html": r.get("review") or "",
                "review": strip_html(r.get("review") or ""),
                "rating": r.get("rating"),
                "verified": bool(r.get("verified")),
                "date_created": r.get("date_created"),
                "date_created_gmt": r.get("date_created_gmt"),
            }
        )
    log(f"  {len(reviews)} avis trouvés.")
    return reviews


# --------------------------------------------------------------------------- #
# Téléchargement des images
# --------------------------------------------------------------------------- #
def ext_from_url(url: str, content_type: str | None) -> str:
    path_ext = os.path.splitext(urlparse(url).path)[1]
    if path_ext and len(path_ext) <= 5:
        return path_ext.lower()
    if content_type:
        guessed = mimetypes.guess_extension(content_type.split(";")[0].strip())
        if guessed:
            return ".jpg" if guessed == ".jpe" else guessed
    return ".jpg"


def download_file(url: str, dest: Path) -> bool:
    if dest.exists() and dest.stat().st_size > 0:
        return True
    for attempt in range(1, RETRIES + 1):
        try:
            with SESSION.get(url, timeout=REQUEST_TIMEOUT, stream=True) as resp:
                resp.raise_for_status()
                dest.parent.mkdir(parents=True, exist_ok=True)
                tmp = dest.with_suffix(dest.suffix + ".part")
                with open(tmp, "wb") as fh:
                    for chunk in resp.iter_content(chunk_size=8192):
                        if chunk:
                            fh.write(chunk)
                tmp.rename(dest)
            return True
        except requests.RequestException as exc:
            log(f"    ! image {url} tentative {attempt}/{RETRIES} : {exc}")
            time.sleep(1.5 * attempt)
    return False


def download_product_images(
    products: list[dict], categories: list[dict], images_root: Path, workers: int = 8
) -> None:
    log(f"→ Téléchargement des images ({workers} en parallèle)…")
    cat_slug_by_id = {c["id"]: c["slug"] for c in categories}

    # 1) préparer la liste des tâches (le serveur limite le débit par connexion,
    #    donc on parallélise pour compenser).
    jobs = []  # (url, dest, img_dict)
    dirs_with_images = set()
    for prod in products:
        if prod["category_ids"]:
            cat_slug = cat_slug_by_id.get(prod["category_ids"][0]) or slugify(
                prod["categories"][0]["name"] if prod["categories"] else "sans-categorie"
            )
        else:
            cat_slug = "sans-categorie"

        prod_slug = prod["slug"] or slugify(prod["name"], f"produit-{prod['id']}")
        prod_dir = images_root / cat_slug / prod_slug

        for img in prod["images"]:
            if not img["src"]:
                continue
            filename = f"{img['position']:02d}{ext_from_url(img['src'], None)}"
            dest = prod_dir / filename
            jobs.append((img["src"], dest, img))
        if prod["images"]:
            dirs_with_images.add((prod_dir, id(prod)))

    total = len(jobs)
    ok = 0

    def worker(job):
        url, dest, img = job
        success = download_file(url, dest)
        if success:
            img["local_path"] = str(dest.relative_to(images_root.parent))
        return success

    from concurrent.futures import ThreadPoolExecutor

    done = 0
    with ThreadPoolExecutor(max_workers=workers) as pool:
        for success in pool.map(worker, jobs):
            done += 1
            if success:
                ok += 1
            if done % 20 == 0 or done == total:
                log(f"  {done}/{total} images traitées ({ok} OK)…")

    # 2) écrire les _images.json par produit
    for prod in products:
        if not prod["images"]:
            continue
        if prod["category_ids"]:
            cat_slug = cat_slug_by_id.get(prod["category_ids"][0]) or "sans-categorie"
        else:
            cat_slug = "sans-categorie"
        prod_slug = prod["slug"] or slugify(prod["name"], f"produit-{prod['id']}")
        prod_dir = images_root / cat_slug / prod_slug
        prod_dir.mkdir(parents=True, exist_ok=True)
        (prod_dir / "_images.json").write_text(
            json.dumps(prod["images"], ensure_ascii=False, indent=2), encoding="utf-8"
        )

    log(f"  {ok}/{total} images téléchargées.")


# --------------------------------------------------------------------------- #
# Main
# --------------------------------------------------------------------------- #
def build_pivot(products: list[dict]) -> list[dict]:
    pivot = []
    for prod in products:
        for cat_id in prod["category_ids"]:
            pivot.append({"product_id": prod["id"], "category_id": cat_id})
    return pivot


def main() -> int:
    parser = argparse.ArgumentParser(description="Scraper Verdania -> JSON + images")
    parser.add_argument("--out", default="output", help="dossier de sortie (défaut: output)")
    parser.add_argument("--no-images", action="store_true", help="ne pas télécharger les images")
    parser.add_argument(
        "--workers", type=int, default=8, help="téléchargements d'images en parallèle (défaut: 8)"
    )
    parser.add_argument("--no-reviews", action="store_true", help="ne pas récupérer les avis")
    args = parser.parse_args()

    out_dir = Path(args.out).resolve()
    images_root = out_dir / "images"
    out_dir.mkdir(parents=True, exist_ok=True)

    categories = fetch_categories()
    products = fetch_products()
    reviews = [] if args.no_reviews else fetch_reviews()

    if not args.no_images:
        download_product_images(products, categories, images_root, workers=args.workers)

    pivot = build_pivot(products)

    def dump(name: str, data) -> None:
        path = out_dir / name
        path.write_text(json.dumps(data, ensure_ascii=False, indent=2), encoding="utf-8")
        log(f"  écrit {path}")

    log("→ Écriture des fichiers JSON…")
    dump("categories.json", categories)
    dump("products.json", products)
    dump("product_category.json", pivot)
    dump("reviews.json", reviews)
    dump(
        "database.json",
        {
            "source": BASE_URL,
            "scraped_at": time.strftime("%Y-%m-%dT%H:%M:%S%z"),
            "counts": {
                "categories": len(categories),
                "products": len(products),
                "product_category_links": len(pivot),
            },
            "categories": categories,
            "products": products,
            "product_category": pivot,
            "reviews": reviews,
        },
    )

    log("\n✔ Terminé.")
    log(f"  Catégories : {len(categories)}")
    log(f"  Produits   : {len(products)}")
    log(f"  Liens      : {len(pivot)}")
    log(f"  Avis       : {len(reviews)}")
    log(f"  Dossier    : {out_dir}")
    return 0


if __name__ == "__main__":
    try:
        sys.exit(main())
    except KeyboardInterrupt:
        log("\nInterrompu.")
        sys.exit(130)
