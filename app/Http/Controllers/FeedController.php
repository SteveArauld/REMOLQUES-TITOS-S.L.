<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * Flux produits pour Google Merchant Center (spécification RSS 2.0 + espace de noms g:).
 * Doc : https://support.google.com/merchants/answer/7052112
 *
 *  - GET /feed/google-merchant.xml            -> affichage direct dans le navigateur
 *  - GET /feed/google-merchant.xml/descargar  -> téléchargement du fichier
 */
class FeedController extends Controller
{
    private const GNS = 'http://base.google.com/ns/1.0';
    private const CACHE_KEY = 'feed:google-merchant:v3';
    private const CURRENCY = 'EUR';
    private const SHIP_COUNTRY = 'ES';
    private const SHIP_COST = 0.0;                 // Envío gratis a toda España.
    private const SHIP_MIN_HANDLING_DAYS = 1;      // Preparación del pedido.
    private const SHIP_MAX_HANDLING_DAYS = 2;
    private const SHIP_MIN_TRANSIT_DAYS = 2;       // Página « Gastos y plazos de envío ».
    private const SHIP_MAX_TRANSIT_DAYS = 5;

    /** Affiche le flux dans le navigateur. */
    public function display(Request $request)
    {
        return response($this->xml($request->boolean('nocache')), 200, [
            'Content-Type'  => 'text/xml; charset=UTF-8',
            'X-Robots-Tag'  => 'noindex',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    /** Force le téléchargement du flux. */
    public function download(Request $request)
    {
        return response($this->xml($request->boolean('nocache')), 200, [
            'Content-Type'        => 'application/xml; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="google-merchant.xml"',
            'X-Robots-Tag'        => 'noindex',
        ]);
    }

    private function xml(bool $noCache = false): string
    {
        if ($noCache) {
            Cache::forget(self::CACHE_KEY);
        }

        return Cache::remember(self::CACHE_KEY, now()->addHour(), fn () => $this->build());
    }

    private function build(): string
    {
        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->formatOutput = true;

        $rss = $doc->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $rss->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', self::GNS);
        $doc->appendChild($rss);

        $channel = $doc->createElement('channel');
        $rss->appendChild($channel);

        $this->text($doc, $channel, 'title', config('app.name', 'Tienda'));
        $this->raw($doc, $channel, 'link', url('/'));
        $this->text($doc, $channel, 'description', 'Catálogo de productos para Google Merchant Center');
        $this->raw($doc, $channel, 'lastBuildDate', now()->toRfc2822String());

        Product::query()
            ->with(['images', 'categories'])
            ->orderBy('id')
            ->get()
            ->each(function (Product $p) use ($doc, $channel) {
                if ($node = $this->item($doc, $p)) {
                    $channel->appendChild($node);
                }
            });

        return $doc->saveXML();
    }

    private function item(\DOMDocument $doc, Product $p): ?\DOMElement
    {
        $price = (float) $p->price;
        if ($price <= 0) {
            return null; // GMC : un produit sans prix valide serait refusé.
        }

        // Images : uniquement des URL raster absolues et publiques (pas de SVG/placeholder).
        $images = $p->images
            ->pluck('path')
            ->filter()
            ->reject(fn ($path) => Str::endsWith(strtolower($path), '.svg'))
            ->map(fn ($path) => asset($path))
            ->values();

        if ($images->isEmpty()) {
            return null; // image_link est obligatoire.
        }

        $regular = (float) ($p->regular_price ?: $price);
        $onSale = $p->has_discount && $price < $regular;
        $refPrice = $onSale ? $regular : $price;

        $title = trim(mb_substr(preg_replace('/\s+/u', ' ', $p->name), 0, 150));
        $description = $p->merchant_description ?: $title;

        $item = $doc->createElement('item');

        $this->plain($doc, $item, 'g:id', (string) $p->id);
        $this->text($doc, $item, 'g:title', $title);
        $this->text($doc, $item, 'g:description', $description);
        $this->raw($doc, $item, 'g:link', route('product.show', $p->slug));
        $this->raw($doc, $item, 'g:image_link', $images->first());

        foreach ($images->slice(1, 10) as $extra) {
            $this->raw($doc, $item, 'g:additional_image_link', $extra);
        }

        $this->plain($doc, $item, 'g:availability', ($p->is_in_stock ?? true) ? 'in_stock' : 'out_of_stock');
        $this->plain($doc, $item, 'g:condition', 'new');
        $this->plain($doc, $item, 'g:price', $this->money($refPrice));
        if ($onSale) {
            $this->plain($doc, $item, 'g:sale_price', $this->money($price));
        }

        $this->text($doc, $item, 'g:brand', $p->merchant_brand);

        // Identifiants : MPN si SKU dispo, sinon on déclare explicitement l'absence de GTIN/MPN.
        if ($p->has_merchant_identifier) {
            $this->plain($doc, $item, 'g:mpn', (string) $p->sku);
            $this->plain($doc, $item, 'g:identifier_exists', 'yes');
        } else {
            $this->plain($doc, $item, 'g:identifier_exists', 'no');
        }

        $this->plain($doc, $item, 'g:google_product_category', (string) $p->google_product_category);
        if ($p->categories->isNotEmpty()) {
            $this->text($doc, $item, 'g:product_type', $p->categories->pluck('name')->join(' > '));
        }

        // Livraison ES (alignée sur CartService et la page « Gastos y plazos de envío »).
        $shipping = $doc->createElement('g:shipping');
        $this->plain($doc, $shipping, 'g:country', self::SHIP_COUNTRY);
        $this->plain($doc, $shipping, 'g:service', 'Estándar');
        $this->plain($doc, $shipping, 'g:price', $this->money(self::SHIP_COST));
        $item->appendChild($shipping);

        $this->plain($doc, $item, 'g:min_handling_time', (string) self::SHIP_MIN_HANDLING_DAYS);
        $this->plain($doc, $item, 'g:max_handling_time', (string) self::SHIP_MAX_HANDLING_DAYS);
        $this->plain($doc, $item, 'g:min_transit_time', (string) self::SHIP_MIN_TRANSIT_DAYS);
        $this->plain($doc, $item, 'g:max_transit_time', (string) self::SHIP_MAX_TRANSIT_DAYS);

        if ($p->weight && (float) $p->weight > 0) {
            $this->plain($doc, $item, 'g:shipping_weight', ((float) $p->weight).' kg');
        }

        return $item;
    }

    private function money(float $value): string
    {
        return number_format($value, 2, '.', '').' '.self::CURRENCY;
    }

    /** Élément texte libre -> encapsulé en CDATA. */
    private function text(\DOMDocument $doc, \DOMElement $parent, string $name, string $value): void
    {
        $el = $doc->createElement($name);
        $el->appendChild($doc->createCDATASection($value));
        $parent->appendChild($el);
    }

    /** Élément URL / valeur brute sans CDATA (échappement XML géré par le nœud texte). */
    private function raw(\DOMDocument $doc, \DOMElement $parent, string $name, string $value): void
    {
        $el = $doc->createElement($name);
        $el->appendChild($doc->createTextNode($value));
        $parent->appendChild($el);
    }

    /** Élément enum/numérique (id, price, availability…) sans CDATA. */
    private function plain(\DOMDocument $doc, \DOMElement $parent, string $name, string $value): void
    {
        $el = $doc->createElement($name);
        $el->appendChild($doc->createTextNode($value));
        $parent->appendChild($el);
    }
}
