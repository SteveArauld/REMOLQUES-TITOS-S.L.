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
                            <div class="cart_item" data-cart-row="{{ $line['id'] }}">
                                <div class="product-info">
                                    <a href="{{ route('product.show', $line['slug']) }}"><img src="{{ $line['image'] }}" alt="{{ $line['name'] }}"></a>
                                    <div class="product-name"><a href="{{ route('product.show', $line['slug']) }}">{{ $line['name'] }}</a></div>
                                </div>
                                <div class="product-price" data-title="Precio">
                                    <span class="woocommerce-Price-amount amount"><bdi><span data-line-price="{{ $line['id'] }}">{{ number_format($line['price'], 2, ',', '.') }}</span>&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                </div>
                                <div class="product-quantity" data-title="Cantidad">
                                    {{-- .box est pré-rendu : le script du thème n'injecte alors PAS ses propres
                                         boutons +/- (évite les doublons et la mise en page cassée). --}}
                                    <div class="quantity">
                                        <span class="box">
                                            <button type="button" class="tr-cart-step" data-step="-1" data-for="{{ $line['id'] }}" aria-label="Restar">&minus;</button>
                                            <input type="number" name="quantities[{{ $line['id'] }}]" value="{{ $line['qty'] }}" min="0" max="99"
                                                   class="input-text qty text" data-line-qty="{{ $line['id'] }}">
                                            <button type="button" class="tr-cart-step" data-step="1" data-for="{{ $line['id'] }}" aria-label="Sumar">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="product-subtotal" data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount"><bdi><span data-line-total="{{ $line['id'] }}">{{ number_format($line['line_total'], 2, ',', '.') }}</span>&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                </div>
                                <div class="product-remove">
                                    <a href="#" class="remove" data-cart-remove="{{ $line['id'] }}" aria-label="Eliminar este artículo"><i class="tb-icon tb-icon-cross"></i></a>
                                </div>
                            </div>
                        @endforeach

                        <div class="cart-bottom">
                            <span class="continue-to-shop"><a href="{{ route('shop') }}">Seguir comprando</a></span>
                            {{-- Repli sans JavaScript uniquement --}}
                            <noscript><span class="update-cart"><button type="submit" name="update_cart" value="1" class="update">Actualizar cesta</button></span></noscript>
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
                                    <td><span class="woocommerce-Price-amount amount"><bdi><span data-cart-subtotal>{{ number_format($cart->subtotal(), 2, ',', '.') }}</span>&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></td>
                                </tr>
                                <tr class="woocommerce-shipping-totals shipping">
                                    <th>Envío</th>
                                    <td data-cart-shipping>
                                        @if ($cart->shipping() == 0)
                                            Envío gratuito
                                        @else
                                            <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cart->shipping(), 2, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span data-cart-total>{{ number_format($cart->total(), 2, ',', '.') }}</span>&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></strong></td>
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

    @endif
</div>

@push('scripts')
<script>
(function () {
    var root = document.querySelector('.woocommerce-cart-form');
    if (!root) return;

    var token = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';
    var H = { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json', 'X-CSRF-TOKEN': token };
    var busy = false;

    function post(url, params) {
        var fd = new FormData();
        fd.append('_token', token);
        Object.keys(params).forEach(function (k) { fd.append(k, params[k]); });
        busy = true;
        document.body.classList.add('tr-cart-busy');
        return fetch(url, { method: 'POST', body: fd, headers: H })
            .then(function (r) { return r.json(); })
            .then(function (d) { apply(d); return d; })
            .catch(function () { location.reload(); })
            .finally(function () { busy = false; document.body.classList.remove('tr-cart-busy'); });
    }

    function apply(d) {
        if (!d) return;
        if (d.empty) { location.reload(); return; }

        (d.lines ? Object.keys(d.lines) : []).forEach(function (id) {
            var L = d.lines[id];
            var qty = document.querySelector('[data-line-qty="' + id + '"]');
            if (qty && document.activeElement !== qty) qty.value = L.qty;
            var lt = document.querySelector('[data-line-total="' + id + '"]');
            if (lt) lt.textContent = L.line_total;
        });

        // Lignes supprimées côté serveur
        document.querySelectorAll('[data-cart-row]').forEach(function (row) {
            var id = row.getAttribute('data-cart-row');
            if (!d.lines || !d.lines[id]) row.remove();
        });

        if (d.totals) {
            set('[data-cart-subtotal]', d.totals.subtotal);
            set('[data-cart-total]', d.totals.total);
            var sh = document.querySelector('[data-cart-shipping]');
            if (sh) sh.innerHTML = d.totals.shipping
                ? '<span class="woocommerce-Price-amount amount"><bdi>' + d.totals.shipping + '&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>'
                : 'Envío gratuito';
        }

        // Compteur + mini-panier de l'en-tête (réutilise shop-bridge si présent)
        document.querySelectorAll('.mini-cart-items, .cart-count, .count-cart, .cart_count, .tbay-mini-cart .count')
            .forEach(function (n) { n.textContent = d.count; });
    }
    function set(sel, val) { var n = document.querySelector(sel); if (n) n.textContent = val; }

    function changeQty(id, val) {
        val = Math.max(0, Math.min(99, parseInt(val, 10) || 0));
        if (busy) return;
        post('{{ route('cart.line') }}', { product_id: id, qty: val });
    }

    var timer;
    root.addEventListener('input', function (e) {
        var inp = e.target.closest('[data-line-qty]');
        if (!inp) return;
        clearTimeout(timer);
        timer = setTimeout(function () { changeQty(inp.getAttribute('data-line-qty'), inp.value); }, 450);
    });
    root.addEventListener('change', function (e) {
        var inp = e.target.closest('[data-line-qty]');
        if (inp) { clearTimeout(timer); changeQty(inp.getAttribute('data-line-qty'), inp.value); }
    });

    root.addEventListener('click', function (e) {
        var step = e.target.closest('.tr-cart-step');
        if (step) {
            e.preventDefault();
            var inp = root.querySelector('[data-line-qty="' + step.getAttribute('data-for') + '"]');
            if (inp) changeQty(step.getAttribute('data-for'),
                (parseInt(inp.value, 10) || 0) + (parseInt(step.getAttribute('data-step'), 10) || 0));
            return;
        }
        var rm = e.target.closest('a.remove[data-cart-remove]');
        if (rm) {
            e.preventDefault();
            post('{{ route('cart.remove.post') }}', { product_id: rm.getAttribute('data-cart-remove') });
        }
    });
})();
</script>
<style>
/* Sélecteur de quantité du panier : mise en page maîtrisée, on neutralise les
   règles du thème (.woocommerce-page .quantity button{float:left} etc.). */
.woocommerce-cart-form .product-quantity .quantity{display:inline-block}
.woocommerce-cart-form .product-quantity .quantity .box{display:inline-flex !important;align-items:stretch;border:1px solid #ddd;border-radius:6px;overflow:hidden;background:#fff;width:auto;max-width:none}
.woocommerce-cart-form .product-quantity .quantity .box .tr-cart-step{float:none !important;width:36px;min-width:36px;height:40px;line-height:1 !important;padding:0 !important;margin:0 !important;border:0 !important;background:#fff;color:#333;cursor:pointer;font-size:16px;display:flex;align-items:center;justify-content:center;transition:background .15s}
.woocommerce-cart-form .product-quantity .quantity .box .tr-cart-step:hover{background:#f3f3f3;color:var(--tb-theme-color,#333)}
.woocommerce-cart-form .product-quantity .quantity .box input.qty{float:none !important;width:44px !important;height:40px !important;margin:0 !important;padding:0 !important;border:0 !important;border-left:1px solid #eee !important;border-right:1px solid #eee !important;background:#fff;text-align:center;font-size:15px;-moz-appearance:textfield}
.woocommerce-cart-form .product-quantity .quantity .box input.qty::-webkit-inner-spin-button,
.woocommerce-cart-form .product-quantity .quantity .box input.qty::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}
.tr-cart-busy .cart_totals,.tr-cart-busy .shop_table.cart{opacity:.55;pointer-events:none;transition:opacity .15s}
</style>
@endpush
@endsection
