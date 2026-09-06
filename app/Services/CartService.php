<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartService
{
    private const KEY = 'cart';

    /** @return array<int,array{id:int,name:string,slug:string,price:float,image:?string,qty:int}> */
    public function raw(): array
    {
        return session()->get(self::KEY, []);
    }

    public function add(Product $product, int $qty = 1): void
    {
        $cart = $this->raw();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                'id'        => $product->id,
                'source_id' => $product->source_id,
                'name'      => $product->name,
                'slug'      => $product->slug,
                'price' => (float) $product->price,
                'image' => $product->thumb_url,
                'qty'   => max(1, $qty),
            ];
        }

        session()->put(self::KEY, $cart);
    }

    public function update(int $productId, int $qty): void
    {
        $cart = $this->raw();
        if (! isset($cart[$productId])) {
            return;
        }

        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['qty'] = $qty;
        }

        session()->put(self::KEY, $cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->raw();
        unset($cart[$productId]);
        session()->put(self::KEY, $cart);
    }

    public function clear(): void
    {
        session()->forget(self::KEY);
    }

    public function items(): Collection
    {
        return collect($this->raw())->map(function ($line) {
            $line['line_total'] = round($line['price'] * $line['qty'], 2);

            return $line;
        })->values();
    }

    public function count(): int
    {
        return (int) collect($this->raw())->sum('qty');
    }

    public function subtotal(): float
    {
        return round(collect($this->raw())->sum(fn ($l) => $l['price'] * $l['qty']), 2);
    }

    /** Frais de port : gratuits dès 500 €, sinon 49,90 €. Panier vide => 0. */
    public function shipping(): float
    {
        $sub = $this->subtotal();
        if ($sub <= 0 || $sub >= 500) {
            return 0.0;
        }

        return 49.90;
    }

    public function total(): float
    {
        return round($this->subtotal() + $this->shipping(), 2);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }
}
