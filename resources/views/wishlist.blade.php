@extends('layouts.wp')

@section('title', 'Lista de deseos — Remolques Titos')
@section('body_class', 'page page-template-default woocommerce woocommerce-page woocommerce-wishlist tbay-body-woocommerce')

@section('breadcrumb')
@include('partials.page-heading', ['title' => 'Lista de deseos'])
@endsection

@section('content')
<div class="woocommerce">
    <div class="yith-wcwl-wishlist wishlist_table_wrapper" data-fav-list="{{ route('wishlist.items') }}"
         data-add-url="{{ route('cart.add') }}">
        <table class="shop_table cart wishlist_table">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-stock-status">Disponibilidad</th>
                    <th class="product-add-to-cart">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="wishlist-items-wrapper">
                <tr class="wishlist-loading"><td colspan="6">Cargando&hellip;</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
