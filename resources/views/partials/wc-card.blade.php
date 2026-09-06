@php
    /** @var \App\Models\Product $product */
    $pd  = (int) round($product->has_discount ? (100 - $product->price / $product->regular_price * 100) : 0);
    $rt  = (float) ($product->average_rating ?? 0);
    $rc  = (int) ($product->review_count ?? 0);
    $url = route('product.show', $product->slug);
    $catClasses = ($product->relationLoaded('categories') ? $product->categories : collect())
        ->map(fn ($c) => 'product_cat-' . $c->slug)->implode(' ');
@endphp
<div class="product type-product status-publish instock {{ $catClasses }} has-post-thumbnail {{ $product->has_discount ? 'sale' : '' }} taxable shipping-taxable purchasable product-type-simple">
    <div class="product-block grid product inner" data-product-id="{{ $product->id }}">
        <div class="product-content">
            <div class="block-inner">
                <figure class="image">
                    <a title="{{ $product->name }}" href="{{ $url }}" class="product-image">
                        <img width="270" height="270" src="{{ $product->thumb_url }}" class="attachment-shop_catalog image-effect" alt="{{ $product->name }}" decoding="async" loading="lazy" />
                        <img width="270" height="270" src="{{ $product->hover_thumb_url }}" class="image-hover" alt="{{ $product->name }}" decoding="async" loading="lazy" />
                    </a>
                </figure>

                <div class="group-buttons">
                    <div class="tbay-quick-view">
                        <a href="{{ $url }}" class="qview-button" title="Vista rápida" data-product_id="{{ $product->id }}">
                            <i class="tb-icon tb-icon-eye"></i>
                            <span>Vista rápida</span>
                        </a>
                    </div>

                    <div class="button-wishlist shown-mobile" title="Favoritos">
                        <div class="yith-wcwl-add-to-wishlist yith-wcwl-add-to-wishlist--link-style">
                            <div class="yith-wcwl-add-button">
                                <a href="{{ route('wishlist') }}" class="add_to_wishlist single_add_to_wishlist" data-fav-toggle="{{ $product->id }}" data-product-id="{{ $product->id }}" rel="nofollow">
                                    <svg class="yith-wcwl-icon-svg" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>
                                    </svg>
                                    <span>Añadir a la lista de deseos</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="add-cart" title="Añadir al carrito">
                        <a href="{{ route('cart.add.quick', $product->slug) }}" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="{{ $product->id }}" data-quantity="1" aria-label="Añadir al carrito: &ldquo;{{ $product->name }}&rdquo;" rel="nofollow" role="button">
                            <i class="tb-icon tb-icon-shopping-bag"></i><span class="title-cart">Añadir al carrito</span>
                        </a>
                    </div>
                </div>
            </div>

            @if ($product->has_discount)
                <span class="onsale"><span class="saled">-{{ $pd }}%</span></span>
            @endif

            <div class="caption">
                <h3 class="name "><a href="{{ $url }}">{{ $product->name }}</a></h3>

                @if ($rc > 0)
                    <div class="rating">
                        <div class="star-rating" role="img" aria-label="Valorado con {{ number_format($rt, 2) }} de 5">
                            <span style="width:{{ $rt / 5 * 100 }}%">Valorado con <strong class="rating">{{ number_format($rt, 2) }}</strong> de 5</span>
                        </div>
                        <div class="count"><span>{{ $rc }}</span></div>
                    </div>
                @endif

                @if (filled($product->short_description))
                    <div class="woocommerce-product-details__short-description">
                        {!! $product->short_description_html ?: '<p>' . e($product->short_description) . '</p>' !!}
                    </div>
                @endif

                <span class="price">
                    @if ($product->has_discount)
                        <ins aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span></bdi></span></ins><span class="screen-reader-text">El precio actual es: {{ number_format($product->price, 2) }}&euro;.</span><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->regular_price, 2) }}<span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span></bdi></span></del> <span class="screen-reader-text">El precio original era: {{ number_format($product->regular_price, 2) }}&euro;.</span>
                    @else
                        <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span></bdi></span>
                    @endif
                    <small class="woocommerce-price-suffix">IVA INCLUIDO</small>
                </span>
            </div>
        </div>
    </div>
</div>
