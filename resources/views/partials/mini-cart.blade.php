@php($__cart = app(\App\Services\CartService::class))
<div class="mini_cart_content">
    <div class="mini_cart_inner">
        <div class="mcart-border">
            @if ($__cart->isEmpty())
                <ul class="cart_empty ">
                    <li><span>Su cesta está vacía</span></li>
                    <li class="total"><a class="button wc-continue" href="{{ route('shop') }}">Seguir comprando<i class="tb-icon tb-icon-angle-right"></i></a></li>
                </ul>
            @else
                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                    @foreach ($__cart->items() as $line)
                        <li class="woocommerce-mini-cart-item mini_cart_item" data-product_id="{{ $line['id'] }}" data-source_id="{{ $line['source_id'] ?? '' }}">
                            <a href="#" class="remove remove_from_cart_button" data-product_id="{{ $line['id'] }}" aria-label="Eliminar este artículo">&times;</a>
                            <a href="{{ url('/producto/' . $line['slug']) }}">
                                <img src="{{ $line['image'] }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $line['name'] }}" />
                                {{ $line['name'] }}
                            </a>
                            <span class="mini-qty" data-product_id="{{ $line['id'] }}">
                                <button type="button" class="mini-qty-btn minus" data-step="-1" aria-label="Quitar uno">&minus;</button>
                                <span class="mini-qty-val">{{ $line['qty'] }}</span>
                                <button type="button" class="mini-qty-btn plus" data-step="1" aria-label="Añadir uno">+</button>
                                <span class="mini-qty-price">
                                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($line['price'] * $line['qty'], 2) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="group-button">
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Subtotal:</strong>
                        <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($__cart->subtotal(), 2) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="{{ route('cart.index') }}" class="button wc-forward">Ver cesta</a>
                        <a href="{{ route('checkout.show') }}" class="button checkout wc-forward">Finalizar compra</a>
                    </p>
                </div>
            @endif

            <div class="clearfix"></div>
        </div>
    </div>
</div>
