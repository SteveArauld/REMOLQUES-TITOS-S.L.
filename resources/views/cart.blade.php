@extends('layouts.wp')

@section('title', 'Cesta — Remolques Titos')
@section('body_class', 'page page-template-default woocommerce woocommerce-page woocommerce-cart woocommerce-js tbay-body-woocommerce')

@section('breadcrumb')
<section id="tbay-breadcrumb" style="background-color:#f3f3f3" class="tbay-breadcrumb breadcrumbs-color active-nav-right show-title">
    <div class="container">
        <div class="breadscrumb-inner">
            <ol class="tbay-woocommerce-breadcrumb breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>Cesta</li>
            </ol>
            <a href="javascript:history.back()" class="zota-back-btn"><i class="tb-icon tb-icon-angle-left"></i><span class="text">Página anterior</span></a>
        </div>
    </div>
</section>
<div class="title-not-breadcrumbs"><div class="container"><h1 class="page-title">Cesta</h1></div></div>
@endsection

@section('content')
<div class="woocommerce">
    @if ($items->isEmpty())
        <p class="cart-empty woocommerce-info">Tu cesta está actualmente vacía.</p>
        <p class="return-to-shop">
            <a class="button wc-backward" href="{{ route('shop') }}">Volver a la tienda</a>
        </p>
    @else
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('cart.update') }}" method="post" class="woocommerce-cart-form">
                    @csrf @method('PATCH')

                    <div class="shop_table cart">
                        <div class="cart_item head">
                            <div class="product-info">Producto</div>
                            <div class="product-price">Precio</div>
                            <div class="product-quantity">Cantidad</div>
                            <div class="product-subtotal">Subtotal</div>
                            <div class="product-remove">&nbsp;</div>
                        </div>

                        @foreach ($items as $line)
                            <div class="cart_item">
                                <div class="product-info">
                                    <a href="{{ route('product.show', $line['slug']) }}"><img src="{{ $line['image'] }}" alt="{{ $line['name'] }}"></a>
                                    <div class="product-name"><a href="{{ route('product.show', $line['slug']) }}">{{ $line['name'] }}</a></div>
                                </div>
                                <div class="product-price" data-title="Precio">
                                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($line['price'], 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                </div>
                                <div class="product-quantity" data-title="Cantidad">
                                    <div class="quantity">
                                        <input type="number" name="quantities[{{ $line['id'] }}]" value="{{ $line['qty'] }}" min="0" max="99" class="input-text qty text">
                                    </div>
                                </div>
                                <div class="product-subtotal" data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($line['line_total'], 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                </div>
                                <div class="product-remove">
                                    <a href="#" class="remove" data-cart-remove="{{ $line['id'] }}" aria-label="Eliminar este artículo"><i class="tb-icon tb-icon-cross"></i></a>
                                </div>
                            </div>
                        @endforeach

                        <div class="cart-bottom">
                            <span class="continue-to-shop"><a href="{{ route('shop') }}">Seguir comprando</a></span>
                            <span class="update-cart"><button type="submit" name="update_cart" value="1" class="update">Actualizar cesta</button></span>
                        </div>
                    </div>
                </form>

                @foreach ($items as $line)
                    <form id="remove-{{ $line['id'] }}" action="{{ route('cart.remove') }}" method="post" hidden>
                        @csrf @method('DELETE')
                        <input type="hidden" name="product_id" value="{{ $line['id'] }}">
                    </form>
                @endforeach
            </div>

            <div class="col-lg-4">
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Total de la cesta</h2>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cart->subtotal(), 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></td>
                                </tr>
                                <tr class="woocommerce-shipping-totals shipping">
                                    <th>Envío</th>
                                    <td>
                                        @if ($cart->shipping() == 0)
                                            Envío gratuito
                                        @else
                                            <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cart->shipping(), 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cart->total(), 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ route('checkout.show') }}" class="checkout-button button alt wc-forward">Finalizar compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('click', function (e) {
            var r = e.target.closest('.shop_table.cart a.remove[data-cart-remove]');
            if (!r) return;
            e.preventDefault();
            var f = document.getElementById('remove-' + r.getAttribute('data-cart-remove'));
            if (f) f.submit();
        });
        </script>
    @endif
</div>
@endsection
