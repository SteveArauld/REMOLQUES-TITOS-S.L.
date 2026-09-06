<div class="card">
    <a href="{{ route('product.show', $product->slug) }}" class="card__media">
        @if ($product->has_discount)
            <span class="card__badge">-{{ round(100 - ($product->price / $product->regular_price * 100)) }}%</span>
        @endif
        <button type="button" class="card__fav" data-fav-toggle="{{ $product->id }}" aria-label="Añadir a favoritos">&#9825;</button>
        <img src="{{ $product->thumb_url }}" alt="{{ $product->name }}" loading="lazy">
    </a>
    <div class="card__body">
        <a href="{{ route('product.show', $product->slug) }}" class="card__title">{{ $product->name }}</a>

        @if (($product->review_count ?? 0) > 0)
            <span class="rating-line">@include('partials.stars', ['rating' => $product->average_rating]) ({{ $product->review_count }})</span>
        @endif

        <span class="card__cats">{{ $product->categories->pluck('name')->join(', ') }}</span>

        <span class="price">
            @if ($product->has_discount)<del>{{ number_format($product->regular_price, 2, ',', '.') }} €</del>@endif
            {{ number_format($product->price, 2, ',', '.') }} €
        </span>

        <form action="{{ route('cart.add') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="btn btn--block" type="submit">Añadir a la cesta</button>
        </form>
    </div>
</div>
