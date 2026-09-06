<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load(['images', 'categories', 'reviews']);

        $related = Product::whereHas('categories', fn ($q) => $q->whereIn('categories.id', $product->categories->pluck('id')))
            ->where('id', '!=', $product->id)
            ->with('primaryImage')
            ->take(4)
            ->get();

        $ratingBreakdown = $product->reviews->groupBy('rating')->map->count();

        return view('product', compact('product', 'related', 'ratingBreakdown'));
    }

    public function quickView(Product $product)
    {
        $product->load(['images', 'categories']);

        return view('partials.quick-view', compact('product'));
    }

    public function quickViewByRef(string $ref)
    {
        $product = Product::findByRef($ref);
        abort_if($product === null, 404);
        $product->load(['images', 'categories']);

        return view('partials.quick-view', compact('product'));
    }

    public function storeReview(Request $request, Product $product)
    {
        $data = $request->validate([
            'reviewer' => ['required', 'string', 'max:120'],
            'rating'   => ['required', 'integer', 'min:1', 'max:5'],
            'review'   => ['required', 'string', 'max:2000'],
        ]);

        $review = $product->reviews()->create([
            'reviewer'    => $data['reviewer'],
            'rating'      => $data['rating'],
            'review'      => $data['review'],
            'review_html' => '<p>'.e($data['review']).'</p>',
            'verified'    => false,
            'approved'    => true,
            'reviewed_at' => now(),
        ]);

        $this->refreshAggregates($product);

        return back()->with('status', '¡Gracias! Tu opinión se ha publicado.')->withFragment('opiniones');
    }

    private function refreshAggregates(Product $product): void
    {
        $product->forceFill([
            'average_rating' => round((float) Review::where('product_id', $product->id)->approved()->avg('rating'), 2),
            'review_count'   => Review::where('product_id', $product->id)->approved()->count(),
        ])->save();
    }
}
