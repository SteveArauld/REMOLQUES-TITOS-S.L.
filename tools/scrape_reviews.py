#!/usr/bin/env python3
"""
Récupère les avis clients directement depuis le HTML des fiches produit
(l'API WooCommerce Store n'en expose qu'une partie), et régénère
database/data/reviews.json au format attendu par VerdaniaSeeder.

Usage :
    cd site
    python tools/scrape_reviews.py                 # tous les produits de products.json
    SOURCE_SITE=https://example-source python tools/scrape_reviews.py
"""
from __future__ import annotations

import argparse
import html
import json
import os
import re
import sys
import time
from pathlib import Path
from urllib.request import Request, urlopen

DATA = Path(__file__).resolve().parent.parent / "database" / "data"

RATING_RE = re.compile(r'Valorado con\s+([\d.]+)\s+de\s+5')
AUTHOR_RE = re.compile(r'woocommerce-review__author">\s*([^<]+?)\s*</strong>')
DATE_RE = re.compile(r'<time[^>]*datetime="([^"]+)"')
BODY_RE = re.compile(r'<div class="description">(.*?)</div>', re.S)
TAG_RE = re.compile(r"<[^>]+>")


def fetch(url: str) -> str:
    req = Request(url, headers={"User-Agent": "Mozilla/5.0 (review-scraper)"})
    with urlopen(req, timeout=30) as resp:
        return resp.read().decode("utf-8", "replace")


def parse_reviews(page_html: str, wp_product_id: int):
    i = page_html.find('<ol class="commentlist">')
    if i == -1:
        return
    block = page_html[i:page_html.find("</ol>", i) + 5]

    # Chaque avis commence par id="li-comment-NNNN" ; on découpe là-dessus.
    parts = re.split(r'id="li-comment-(\d+)"', block)
    # parts = [avant, id1, chunk1, id2, chunk2, ...]
    for k in range(1, len(parts), 2):
        comment_id = int(parts[k])
        chunk = parts[k + 1]

        rating = RATING_RE.search(chunk)
        author = AUTHOR_RE.search(chunk)
        date = DATE_RE.search(chunk)
        body = BODY_RE.search(chunk)
        body_html = body.group(1).strip() if body else ""
        body_txt = html.unescape(TAG_RE.sub("", body_html)).strip()

        if not body_txt:
            continue

        yield {
            "id": comment_id,
            "product_id": wp_product_id,
            "reviewer": html.unescape(author.group(1)).strip() if author else "Cliente",
            "review_html": body_html,
            "review": body_txt,
            "rating": int(round(float(rating.group(1)))) if rating else 5,
            "verified": "woocommerce-review__verified" in chunk,
            "date_created": date.group(1) if date else None,
        }


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--base", default=os.environ.get("SOURCE_SITE", ""))
    ap.add_argument("--sleep", type=float, default=0.4)
    args = ap.parse_args()

    products = json.loads((DATA / "products.json").read_text("utf-8"))
    all_reviews: list[dict] = []
    seen_ids: set[int] = set()
    with_reviews = 0

    for n, p in enumerate(products, 1):
        slug = p["slug"]
        wp_id = p["id"]
        url = f'{args.base.rstrip("/")}/producto/{slug}/'
        try:
            page = fetch(url)
        except Exception as exc:  # noqa: BLE001
            print(f"  ! {slug}: {exc}", file=sys.stderr)
            continue

        count = 0
        for rev in parse_reviews(page, wp_id):
            if rev["id"] in seen_ids:
                continue
            seen_ids.add(rev["id"])
            all_reviews.append(rev)
            count += 1

        if count:
            with_reviews += 1
        print(f"[{n:>3}/{len(products)}] {slug:<55} {count:>4} avis")
        time.sleep(args.sleep)

    out = DATA / "reviews.json"
    if len(all_reviews) < 100:
        print(f"\n! Seulement {len(all_reviews)} avis extraits — reviews.json NON modifié (parsing suspect).",
              file=sys.stderr)
        (DATA / "reviews.scraped.json").write_text(
            json.dumps(all_reviews, ensure_ascii=False, indent=2), "utf-8")
        return 1

    # Sauvegarde de l'ancien fichier puis écriture atomique.
    if out.exists():
        out.replace(DATA / "reviews.prev.json")
    tmp = DATA / "reviews.json.tmp"
    tmp.write_text(json.dumps(all_reviews, ensure_ascii=False, indent=2), "utf-8")
    tmp.replace(out)
    print(f"\n{len(all_reviews)} avis sur {with_reviews} produits -> {out}")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
