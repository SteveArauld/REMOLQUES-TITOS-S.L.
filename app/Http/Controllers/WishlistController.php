<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist');
    }

    /** Renvoie les produits correspondant aux ids stockés côté client (localStorage). */
    public function items(Request $request)
    {
        $refs = collect(explode(',', $request->string('ids')->toString()))
            ->map(fn ($v) => trim((string) $v))
            ->filter()
            ->unique()
            ->take(60)
            ->values();

        $rows = $refs->map(function ($ref) {
            $p = Product::with('primaryImage')->where(fn ($q) => $q
                ->where('id', is_numeric($ref) ? (int) $ref : 0)
                ->orWhere('source_id', is_numeric($ref) ? (int) $ref : 0)
                ->orWhere('slug', (string) $ref)
            )->first();

            if ($p === null) {
                return null;
            }

            return [
                // ref = valeur exacte stockée côté client, indispensable pour pouvoir retirer la ligne
                'ref'      => (string) $ref,
                'id'       => $p->id,
                'name'     => $p->name,
                'url'      => route('product.show', $p->slug),
                'price'    => number_format((float) $p->price, 2, ',', '.'),
                'regular'  => $p->has_discount ? number_format((float) $p->regular_price, 2, ',', '.') : null,
                'image'    => $p->thumb_url,
                'in_stock' => (bool) ($p->is_in_stock ?? true),
            ];
        })->filter()->values();

        // Réfs qui ne correspondent à aucun produit : à purger côté client
        $stale = $refs->diff($rows->pluck('ref'))->values();

        return response()->json(['items' => $rows, 'stale' => $stale]);
    }
}
