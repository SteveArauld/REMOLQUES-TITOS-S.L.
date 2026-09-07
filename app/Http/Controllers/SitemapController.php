<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

/**
 * Sitemap XML (protocole sitemaps.org 0.9).
 *  - GET /sitemap.xml
 * À déclarer dans Google Search Console et Google Merchant Center.
 */
class SitemapController extends Controller
{
    private const CACHE_KEY = 'sitemap:xml:v1';

    public function index()
    {
        $xml = Cache::remember(self::CACHE_KEY, now()->addHour(), fn () => $this->build());

        return response($xml, 200, [
            'Content-Type'  => 'application/xml; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    private function build(): string
    {
        $urls = [];

        // Pages statiques principales.
        foreach ([
            ['/', '1.0', 'daily'],
            ['/tienda', '0.9', 'daily'],
            ['/contacto', '0.5', 'monthly'],
            ['/seguimiento-de-pedidos', '0.3', 'monthly'],
            ['/pagina/gastos-y-plazos-de-envio', '0.4', 'monthly'],
            ['/pagina/politica-de-devoluciones-y-reembolsos', '0.3', 'yearly'],
            ['/pagina/politica-de-entregas', '0.3', 'yearly'],
            ['/pagina/terminos-y-condiciones', '0.3', 'yearly'],
            ['/pagina/aviso-legal', '0.3', 'yearly'],
            ['/pagina/politica-privacidad', '0.3', 'yearly'],
        ] as [$path, $priority, $freq]) {
            $urls[] = ['loc' => url($path), 'priority' => $priority, 'changefreq' => $freq];
        }

        Category::orderBy('id')->get()->each(function (Category $c) use (&$urls) {
            $urls[] = [
                'loc'        => route('category', $c->slug),
                'priority'   => '0.7',
                'changefreq' => 'weekly',
                'lastmod'    => optional($c->updated_at)->toAtomString(),
            ];
        });

        Product::orderBy('id')->get()->each(function (Product $p) use (&$urls) {
            $urls[] = [
                'loc'        => route('product.show', $p->slug),
                'priority'   => '0.8',
                'changefreq' => 'weekly',
                'lastmod'    => optional($p->updated_at)->toAtomString(),
            ];
        });

        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->formatOutput = true;

        $set = $doc->createElement('urlset');
        $set->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $doc->appendChild($set);

        foreach ($urls as $u) {
            $node = $doc->createElement('url');
            $node->appendChild($doc->createElement('loc', htmlspecialchars($u['loc'], ENT_XML1)));
            if (! empty($u['lastmod'])) {
                $node->appendChild($doc->createElement('lastmod', $u['lastmod']));
            }
            $node->appendChild($doc->createElement('changefreq', $u['changefreq']));
            $node->appendChild($doc->createElement('priority', $u['priority']));
            $set->appendChild($node);
        }

        return $doc->saveXML();
    }
}
