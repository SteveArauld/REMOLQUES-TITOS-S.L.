#!/usr/bin/env python3
"""Crawle le site Laravel local et signale tout lien interne cassé (>=400)."""
import re, sys, collections, urllib.parse, concurrent.futures
import requests

BASE = "http://127.0.0.1:8000"
S = requests.Session()
S.headers["User-Agent"] = "linkcheck/1.0"

seen_pages = set()
results = {}          # url -> status
link_sources = collections.defaultdict(set)  # url -> {pages qui pointent dessus}
asset_results = {}    # url -> status (css/js/img)

HREF_RE = re.compile(r'(?:href|src)\s*=\s*["\']([^"\']+)["\']', re.I)

SKIP_PREFIX = ("mailto:", "tel:", "javascript:", "data:", "#")

def norm(url, page):
    url = url.strip()
    if not url or url.startswith(SKIP_PREFIX):
        return None
    absu = urllib.parse.urljoin(page, url)
    p = urllib.parse.urlparse(absu)
    if p.scheme not in ("http", "https"):
        return None
    if p.netloc != "127.0.0.1:8000":
        return None  # externe : ignoré
    # enlève le fragment
    return urllib.parse.urlunparse(p._replace(fragment=""))

def is_html_page(u):
    path = urllib.parse.urlparse(u).path
    return not re.search(r'\.(css|js|png|jpe?g|gif|svg|webp|ico|woff2?|ttf|eot|xml|json|pdf|mp4|zip)(\?|$)', path, re.I)

def check_asset(u):
    if u in asset_results:
        return
    try:
        r = S.get(u, timeout=20, allow_redirects=True, stream=True)
        asset_results[u] = r.status_code
        r.close()
    except Exception as e:
        asset_results[u] = f"ERR {e.__class__.__name__}"

def crawl(url, depth=0):
    if url in seen_pages or depth > 6:
        return
    seen_pages.add(url)
    try:
        r = S.get(url, timeout=30, allow_redirects=True)
    except Exception as e:
        results[url] = f"ERR {e.__class__.__name__}"
        return
    results[url] = r.status_code
    if r.status_code >= 400 or "text/html" not in r.headers.get("content-type", ""):
        return
    hrefs = HREF_RE.findall(r.text)
    child_pages = []
    assets = []
    for h in hrefs:
        n = norm(h, url)
        if not n:
            continue
        link_sources[n].add(url)
        if is_html_page(n):
            child_pages.append(n)
        else:
            assets.append(n)
    with concurrent.futures.ThreadPoolExecutor(max_workers=12) as ex:
        list(ex.map(check_asset, [a for a in assets if a not in asset_results]))
    for c in child_pages:
        crawl(c, depth + 1)

# Points de départ
seeds = [f"{BASE}/", f"{BASE}/tienda", f"{BASE}/carrito", f"{BASE}/checkout",
         f"{BASE}/contacto", f"{BASE}/favoritos", f"{BASE}/mi-cuenta",
         f"{BASE}/seguimiento-de-pedidos", f"{BASE}/feed/google-merchant.xml"]
for s in seeds:
    crawl(s)

print("\n================ PAGES ================")
bad = {u: s for u, s in results.items() if not (isinstance(s, int) and s < 400)}
ok = len(results) - len(bad)
print(f"{len(results)} pages visitées — {ok} OK, {len(bad)} problématiques")
for u, s in sorted(bad.items()):
    print(f"  [{s}] {u}")
    for src in list(link_sources.get(u, []))[:4]:
        print(f"        ← {src}")

print("\n================ ASSETS ================")
abad = {u: s for u, s in asset_results.items() if not (isinstance(s, int) and s < 400)}
print(f"{len(asset_results)} assets vérifiés — {len(asset_results)-len(abad)} OK, {len(abad)} problématiques")
for u, s in sorted(abad.items()):
    print(f"  [{s}] {u}")
    for src in list(link_sources.get(u, []))[:3]:
        print(f"        ← {src}")

sys.exit(1 if bad or abad else 0)
