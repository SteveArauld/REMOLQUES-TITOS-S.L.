<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category = null;

        $query = Product::query()->with(['primaryImage', 'images', 'categories'])->withCount('reviews');

        if ($slug = $request->string('categoria')->toString()) {
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $query->whereHas('categories', fn ($q) => $q->where('categories.id', $category->id));
            }
        }

        if ($term = ($request->string('q')->toString() ?: $request->string('s')->toString())) {
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('short_description', 'like', "%{$term}%");
            });
        }

        match ($request->string('orderby')->toString()) {
            'price_asc'  => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'rating'     => $query->orderByDesc('average_rating'),
            'newest'     => $query->latest('id'),
            default      => $query->orderBy('name'),
        };

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::withCount('products')
            ->has('products')
            ->orderBy('name')
            ->get();

        return view('shop', compact('products', 'categories', 'category'));
    }

    public function category(Category $category, Request $request)
    {
        $request->merge(['categoria' => $category->slug]);

        return $this->index($request);
    }
}
