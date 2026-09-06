@php
    $rt = (float) ($product->average_rating ?? 0);
    $rc = (int) ($product->review_count ?? 0);
    $imgs = $product->relationLoaded('images') ? $product->images : collect();
    $qvDesc = filled($product->short_description)
        ? ($product->short_description_html ?: '<p>' . e($product->short_description) . '</p>')
        : (filled($product->description) ? '<p>' . e(\Illuminate\Support\Str::limit(strip_tags($product->description), 320)) . '</p>' : '');
@endphp
<div class="tr-qv">
    <div class="tr-qv-media">
        <div class="tr-qv-main"><img src="{{ $product->thumb_url }}" alt="{{ $product->name }}"></div>
        @if ($imgs->count() > 1)
            <div class="tr-qv-thumbs">
                @foreach ($imgs->take(6) as $i => $img)
                    <img src="{{ $img->url }}" alt="" data-full="{{ $img->url }}" class="{{ $i === 0 ? 'is-active' : '' }}">
                @endforeach
            </div>
        @endif
    </div>

    <div class="tr-qv-info">
        <h2 class="tr-qv-title">{{ $product->name }}</h2>

        @if ($rc > 0)
            <div class="tr-qv-rating">
                <div class="star-rating" role="img" aria-label="Valorado con {{ number_format($rt, 2) }} de 5">
                    <span style="width:{{ $rt / 5 * 100 }}%">Valorado con <strong class="rating">{{ number_format($rt, 2) }}</strong> de 5</span>
                </div>
                <span class="tr-qv-count">({{ $rc }})</span>
            </div>
        @endif

        <div class="tr-qv-price price">
            @if ($product->has_discount)
                <ins><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></ins>
                <del><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->regular_price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></del>
            @else
                <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
            @endif
            <small class="woocommerce-price-suffix">IVA INCLUIDO</small>
        </div>

        @if ($qvDesc)
            <div class="tr-qv-desc">{!! $qvDesc !!}</div>
        @endif

        <div class="tr-qv-actions">
            <span class="tr-qv-stepper">
                <button type="button" class="tr-qv-step" data-step="-1" aria-label="Quitar uno">&minus;</button>
                <input type="text" class="tr-qv-qty" name="quantity" value="1" inputmode="numeric" readonly>
                <button type="button" class="tr-qv-step" data-step="1" aria-label="Añadir uno">+</button>
            </span>
            <a href="{{ route('cart.add') }}" class="button add_to_cart_button ajax_add_to_cart" data-product_id="{{ $product->id }}" data-quantity-target=".tr-qv-qty" role="button">
                <i class="tb-icon tb-icon-shopping-bag"></i> Añadir al carrito
            </a>
        </div>

        <p class="tr-qv-more"><a href="{{ route('product.show', $product->slug) }}">Ver todos los detalles</a></p>
    </div>
</div>
