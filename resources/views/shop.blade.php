@extends('layouts.wp')

@section('body_class', 'archive tax-product_cat woocommerce woocommerce-page woocommerce-js tbay-product-category tbay-body-woocommerce')

@section('breadcrumb')
<section id="tbay-breadcrumb" style="background-color:#f3f3f3" class="tbay-breadcrumb breadcrumbs-color active-nav-right">
    <div class="container">
        <div class="breadscrumb-inner">
            <ol class="tbay-woocommerce-breadcrumb breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>{{ $category->name ?? 'Tienda' }}</li>
            </ol>
            <a href="javascript:history.back()" class="zota-back-btn"><i class="tb-icon tb-icon-angle-left"></i><span class="text">Página anterior</span></a>
        </div>
    </div>
</section>
<div class="title-not-breadcrumbs"><div class="container"><h1 class="page-title">{{ $category->name ?? 'Tienda' }}</h1></div></div>
@endsection

@section('content')
<div class="woocommerce archive-shop archive-full content">

    @if ($category?->description)
        <div class="term-description">{{ $category->description }}</div>
    @endif

    <div class="woof_products_top_panel"></div>
    <div class="tbay-filter">
        <div class="woocommerce-notices-wrapper"></div>
        <div class="main-filter d-flex justify-content-end ">
            <div class="display-mode-warpper">
                <a href="javascript:void(0);" id="display-mode-grid" class="display-mode-btn active" title="Grid"><i class="tb-icon tb-icon-grid"></i></a>
                <a href="javascript:void(0);" id="display-mode-list" class="display-mode-btn list " title="List"><i class="tb-icon tb-icon-list"></i></a>
            </div>
            <p class="woocommerce-result-count" role="status">{{ $products->total() }} resultados</p>
            <div class="tbay-ordering">
                <span>Ordenar por:</span>
                <form method="get" class="woocommerce-ordering">
                    @if (request('q'))<input type="hidden" name="q" value="{{ request('q') }}">@endif
                    <select name="orderby" class="orderby" aria-label="Pedido de la tienda" onchange="this.form.submit()">
                        <option value="" @selected(!request('orderby'))>Orden predeterminado</option>
                        <option value="price_asc"  @selected(request('orderby')==='price_asc')>Ordenar por precio: bajo a alto</option>
                        <option value="price_desc" @selected(request('orderby')==='price_desc')>Ordenar por precio: alto a bajo</option>
                        <option value="rating"     @selected(request('orderby')==='rating')>Ordenar por puntuación media</option>
                        <option value="newest"     @selected(request('orderby')==='newest')>Ordenar por los últimos</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    @if ($products->count())
        <div class="display-products products products-grid">
            <div class="row" data-xlgdesktop="3" data-desktop="3" data-desktopsmall="3" data-tablet="3" data-landscape="3" data-mobile="2">
                @foreach ($products as $product)
                    @include('partials.wc-card')
                @endforeach
            </div>
        </div>

        <nav class="woocommerce-pagination">{{ $products->onEachSide(1)->links() }}</nav>
    @else
        <div class="woocommerce-info">No hay productos que coincidan con tu selección.</div>
    @endif

</div>

<style>
/* La description courte n'apparaît qu'en mode liste (comme le site officiel) */
.display-products.products-grid .woocommerce-product-details__short-description { display: none; }
.display-products.products-list .product-block .woocommerce-product-details__short-description { display: block; }
</style>
<script>
(function () {
    var wrap = document.querySelector('.display-products');
    var row  = wrap && wrap.querySelector('.row');
    var bGrid = document.getElementById('display-mode-grid');
    var bList = document.getElementById('display-mode-list');
    if (!wrap || !row || !bGrid || !bList) return;

    var GRID = { xlgdesktop: '3', desktop: '3', desktopsmall: '3', tablet: '3', landscape: '3', mobile: '2' };

    function apply(mode) {
        var list = mode === 'list';
        wrap.classList.toggle('products-list', list);
        wrap.classList.toggle('products-grid', !list);
        bList.classList.toggle('active', list);
        bGrid.classList.toggle('active', !list);
        row.querySelectorAll('.product-block').forEach(function (b) {
            b.classList.toggle('list', list);
            b.classList.toggle('grid', !list);
            // En mode liste, les boutons d'action vont sous la description (dans .caption) ;
            // en mode grille, ils reviennent en superposition sur l'image (.block-inner).
            var gb = b.querySelector('.group-buttons');
            var caption = b.querySelector('.caption');
            var inner = b.querySelector('.block-inner');
            if (gb) {
                if (list && caption) caption.appendChild(gb);
                else if (!list && inner) inner.appendChild(gb);
            }
        });
        Object.keys(GRID).forEach(function (k) {
            row.setAttribute('data-' + k, list ? '1' : GRID[k]);
        });
        try { localStorage.setItem('shopDisplayMode', mode); } catch (e) {}
    }

    bGrid.addEventListener('click', function () { apply('grid'); });
    bList.addEventListener('click', function () { apply('list'); });

    var saved;
    try { saved = localStorage.getItem('shopDisplayMode'); } catch (e) {}
    if (saved === 'list') apply('list');
})();
</script>
@endsection
