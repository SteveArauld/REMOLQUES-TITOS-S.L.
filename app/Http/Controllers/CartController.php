<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        return view('cart', ['items' => $this->cart->items(), 'cart' => $this->cart]);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required'],
            'quantity'   => ['nullable', 'integer', 'min:1', 'max:99'],
        ]);

        $product = Product::findByRef($data['product_id']);
        abort_if($product === null, 404);
        $this->cart->add($product, (int) ($data['quantity'] ?? 1));

        if ($request->expectsJson() || $request->ajax()) {
            return $this->fragmentPayload(['added' => $product->name]);
        }

        return redirect()->route('cart.index')->with('status', 'Producto añadido a la cesta.');
    }

    /** Ajout rapide via lien GET (repli sans JavaScript / robustesse SEO). */
    public function addQuick(Request $request, string $ref)
    {
        $product = Product::findByRef($ref);
        abort_if($product === null, 404);

        $qty = max(1, min(99, (int) $request->integer('cantidad', 1)));
        $this->cart->add($product, $qty);

        return redirect()->route('cart.index')->with('status', 'Producto añadido a la cesta.');
    }

    /** Fragment HTML du mini-panier + compteurs, pour rafraîchir sans recharger. */
    public function fragment()
    {
        return $this->fragmentPayload();
    }

    /** Change la quantité d'une ligne (valeur absolue) et renvoie le fragment. */
    public function setLineQty(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required'],
            'qty'        => ['required', 'integer', 'min:0', 'max:99'],
        ]);

        $product = Product::findByRef($data['product_id']);
        if ($product !== null) {
            $this->cart->update($product->id, (int) $data['qty']);
        }

        return $this->fragmentPayload();
    }

    private function fragmentPayload(array $extra = [])
    {
        return response()->json(array_merge([
            'count'    => $this->cart->count(),
            'subtotal' => $this->cart->subtotal(),
            'html'     => view('partials.mini-cart')->render(),
        ], $extra));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'quantities'   => ['required', 'array'],
            'quantities.*' => ['integer', 'min:0', 'max:99'],
        ]);

        foreach ($data['quantities'] as $productId => $qty) {
            $this->cart->update((int) $productId, (int) $qty);
        }

        return redirect()->route('cart.index')->with('status', 'Cesta actualizada.');
    }

    public function count()
    {
        return response()->json(['count' => $this->cart->count(), 'subtotal' => $this->cart->subtotal()]);
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => ['required']]);
        $product = Product::findByRef($request->input('product_id'));
        $this->cart->remove($product?->id ?? (int) $request->integer('product_id'));

        if ($request->expectsJson() || $request->ajax()) {
            return $this->fragmentPayload();
        }

        return redirect()->route('cart.index')->with('status', 'Producto eliminado.');
    }
}
