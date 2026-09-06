<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Point d'entrée compatible avec les appels AJAX du thème Zota
 * (le thème appelle /wp-admin/admin-ajax.php?action=…).
 */
class AjaxController extends Controller
{
    public function adminAjax(Request $request)
    {
        return match ($request->query('action')) {
            'zota_autocomplete_search' => $this->autocomplete($request),
            default                    => response()->json(['suggestions' => []]),
        };
    }

    /** Autocomplétion de la barre de recherche (format devbridge Autocomplete). */
    private function autocomplete(Request $request)
    {
        $term = trim((string) $request->query('query', $request->query('q', '')));
        $limit = (int) $request->query('number', 6);
        $limit = max(1, min($limit, 12));
        $catSlug = (string) $request->query('product_cat', '');

        if (mb_strlen($term) < 2) {
            return response()->json(['suggestions' => []]);
        }

        $query = Product::query()
            ->with('primaryImage')
            ->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('sku', 'like', "%{$term}%")
                    ->orWhere('short_description', 'like', "%{$term}%");
            });

        if ($catSlug !== '') {
            $query->whereHas('categories', fn ($q) => $q->where('slug', $catSlug));
        }

        $total = (clone $query)->count();
        $products = $query->orderBy('name')->limit($limit)->get();

        if ($products->isEmpty()) {
            return response()->json([
                'suggestions' => [[
                    'value'    => 'No se han encontrado productos para «'.e($term).'»',
                    'data'     => null,
                    'link'     => '',
                    'no_found' => true,
                ]],
            ]);
        }

        $shopUrl = route('shop', array_filter([
            'q'         => $term,
            'categoria' => $catSlug ?: null,
        ]));

        $suggestions = $products->map(function (Product $p) {
            return [
                'value' => $p->name,
                'data'  => $p->slug,
                'link'  => route('product.show', $p->slug),
                'image' => '<img src="'.e($p->thumb_url).'" alt="'.e($p->name).'" width="50" height="50" />',
                'price' => '<span class="price"><span class="woocommerce-Price-amount amount">'
                    .number_format((float) $p->price, 2, ',', '.').'&nbsp;&euro;</span></span>',
            ];
        })->values()->all();

        // Le thème lit result/view_all sur le 1er élément.
        $suggestions[0]['result'] = $total.' '.($total === 1 ? 'resultado' : 'resultados');
        $suggestions[0]['view_all'] = $total > count($suggestions);
        $suggestions[0]['view_all_link'] = $shopUrl;

        return response()->json(['suggestions' => $suggestions]);
    }
}
