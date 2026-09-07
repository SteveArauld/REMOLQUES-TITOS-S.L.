@extends('layouts.wp')

@section('body_class', 'wp-singular single single-product woocommerce woocommerce-page woocommerce-js singular-shop tbay-body-woocommerce')

@php
    $seoName = trim(preg_replace('/\s+/u', ' ', $product->name));
    $seoBrand = $product->merchant_brand;
    $seoPriceTxt = number_format((float) $product->price, 2, ',', '.').' €';
    $seoRawDesc = $product->short_description
        ? trim(preg_replace('/\s+/u', ' ', strip_tags($product->short_description)))
        : $product->merchant_description;
@endphp

@section('meta_title', ($seoBrand && stripos($seoName, $seoBrand) === false ? $seoBrand.' ' : '').$seoName.' | '.$seoPriceTxt.' - Remolques Titos')
@section('meta_description', \Illuminate\Support\Str::limit($seoRawDesc !== '' ? $seoRawDesc : ($seoName.' al mejor precio en Remolques Titos. Envío gratis a toda España. IVA incluido.'), 160))
@section('canonical', route('product.show', $product->slug))
@section('og_type', 'product')
@section('og_image', $product->images->isNotEmpty() ? asset($product->images->first()->path) : $product->thumb_url)

@section('breadcrumb')
<section id="tbay-breadcrumb" style="background-color:#f3f3f3" class="tbay-breadcrumb breadcrumbs-color active-nav-right">
    <div class="container">
        <div class="breadscrumb-inner">
            <ol class="tbay-woocommerce-breadcrumb breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                @foreach ($product->categories as $c)
                    <li><a href="{{ route('category', $c->slug) }}">{{ $c->name }}</a></li>
                @endforeach
            </ol>
            <a href="javascript:history.back()" class="zota-back-btn"><i class="tb-icon tb-icon-angle-left"></i><span class="text">Página anterior</span></a>
        </div>
    </div>
</section>
@endsection

@section('content')
@php
    $pd  = $product->has_discount ? (int) round(100 - $product->price / $product->regular_price * 100) : 0;
    $imgs = $product->images->count() ? $product->images : collect([(object) ['url' => $product->thumb_url]]);
    $tags = collect($product->tags ?? [])->map(fn ($t) => is_array($t) ? ($t['name'] ?? reset($t)) : $t)->filter();
    $inStock = (bool) ($product->is_in_stock ?? true);
    $pid = $product->id;
    $galleryUrls = $imgs->pluck('url')->values();
    $reviewsShown = $product->reviews->count();

    // Données structurées schema.org/Product (exigé/recommandé par Google Merchant Center)
    $ldOffer = [
        '@type'           => 'Offer',
        'url'             => route('product.show', $product->slug),
        'priceCurrency'   => $product->currency ?: 'EUR',
        'price'           => number_format((float) $product->price, 2, '.', ''),
        'priceValidUntil' => now()->addYear()->format('Y-m-d'),
        'itemCondition'   => 'https://schema.org/NewCondition',
        'availability'    => $inStock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'seller'          => ['@type' => 'Organization', 'name' => config('app.name', 'Remolques Titos')],
    ];
    $ld = [
        '@context'    => 'https://schema.org/',
        '@type'       => 'Product',
        'name'        => $product->name,
        'description' => $product->merchant_description,
        'image'       => $galleryUrls->all(),
        'brand'       => ['@type' => 'Brand', 'name' => $product->merchant_brand],
        'offers'      => $ldOffer,
    ];
    // Identifiants : uniquement s'ils sont réels (MPN = SKU fabricant, GTIN si renseigné).
    if (filled($product->sku)) {
        $ld['sku'] = (string) $product->sku;
        $ld['mpn'] = (string) $product->sku;
    }
    if (filled($product->gtin ?? null)) {
        $ld['gtin'] = (string) $product->gtin;
    }

    // Avis : on ne garde que les avis approuvés ayant un texte réel (pas de "notes vides").
    $ldReviews = $product->reviews
        ->filter(fn ($r) => trim(strip_tags((string) ($r->review_html ?: $r->review))) !== '' && (int) $r->rating > 0)
        ->values();

    if ($ldReviews->isNotEmpty() && $product->average_rating) {
        $ld['aggregateRating'] = [
            '@type'       => 'AggregateRating',
            'ratingValue' => number_format((float) $product->average_rating, 2, '.', ''),
            'reviewCount' => $ldReviews->count(),
            'bestRating'  => 5,
            'worstRating' => 1,
        ];
        $ld['review'] = $ldReviews->take(5)->map(fn ($r) => [
            '@type'         => 'Review',
            'reviewRating'  => ['@type' => 'Rating', 'ratingValue' => (int) $r->rating, 'bestRating' => 5],
            'author'        => ['@type' => 'Person', 'name' => $r->reviewer],
            'reviewBody'    => \Illuminate\Support\Str::limit(strip_tags((string) ($r->review_html ?: $r->review)), 500),
            'datePublished' => optional($r->reviewed_at)->format('Y-m-d'),
        ])->all();
    }
@endphp

<script type="application/ld+json">{!! json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

<div class="woocommerce singular-shop">
    @if (session('status'))
        <div class="woocommerce-notices-wrapper"><div class="woocommerce-message" role="alert">{{ session('status') }}</div></div>
    @endif

    <div id="product-{{ $pid }}" class="product type-product {{ $product->has_discount ? 'sale' : '' }} product-type-simple tr-pdp">
        <div class="tr-pdp-gallery">
            @if ($product->has_discount)
                <span class="onsale"><span class="saled">-{{ $pd }}%</span></span>
            @endif
            <button type="button" class="tr-pdp-main" id="tr-pdp-zoom" aria-label="Ampliar imagen">
                <img src="{{ $galleryUrls->first() }}" alt="{{ $product->name }}" id="tr-pdp-main-img">
                <span class="tr-pdp-zoom-ico"><i class="tb-icon tb-icon-search"></i></span>
            </button>
            @if ($galleryUrls->count() > 1)
                <div class="tr-pdp-thumbs">
                    @foreach ($galleryUrls as $i => $u)
                        <img src="{{ $u }}" data-full="{{ $u }}" alt="" class="{{ $i === 0 ? 'is-active' : '' }}">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="summary entry-summary">
            <div class="zota-single-product-title-main">
                <h1 class="product_title entry-title">{{ $product->name }}</h1>
                @if ($reviewsShown > 0 && $product->average_rating)
                    <div class="woocommerce-product-rating">
                        <div class="star-rating" role="img" aria-label="Valorado con {{ number_format($product->average_rating, 2) }} de 5">
                            <span style="width:{{ $product->average_rating / 5 * 100 }}%">Valorado con <strong class="rating">{{ number_format($product->average_rating, 2) }}</strong> de 5 en base a <span class="rating">{{ $reviewsShown }}</span> valoraciones de clientes</span>
                        </div>
                        <a href="#tab-reviews" class="woocommerce-review-link">Comentarios</a>
                    </div>
                @endif
            </div>

            <p class="price">
                @if ($product->has_discount)
                    <ins><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></ins>
                    <del><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->regular_price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></del>
                @else
                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2) }}<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span>
                @endif
                <small class="woocommerce-price-suffix">IVA INCLUIDO</small>
            </p>

            @if (filled($product->short_description))
                <div class="woocommerce-product-details__short-description">
                    {!! $product->short_description_html ?: '<p>' . e($product->short_description) . '</p>' !!}
                </div>
            @endif

            <p class="tr-pdp-flag {{ $inStock ? 'ok' : 'ko' }}">{{ $inStock ? '✅ En stock' : '⛔ Agotado' }}</p>
            <p class="tr-pdp-flag ship">🚚 Envío rápido entre 2 y 5 días</p>

            <form class="cart" action="{{ route('cart.add') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div id="shop-now" class="shop-now has-wishlist">
                    <span class="tr-qv-stepper">
                        <button type="button" class="tr-qv-step" data-step="-1" aria-label="Quitar uno">&minus;</button>
                        <input type="text" class="tr-qv-qty" name="quantity" value="1" inputmode="numeric" readonly>
                        <button type="button" class="tr-qv-step" data-step="1" aria-label="Añadir uno">+</button>
                    </span>
                    <button type="submit" class="single_add_to_cart_button button alt" data-product_id="{{ $product->id }}" data-quantity-target=".tr-qv-qty">Añadir al carrito</button>
                    <span class="button-wishlist" title="Favoritos">
                        <a href="#" class="add_to_wishlist" data-fav-toggle="{{ $product->id }}" aria-label="Añadir a favoritos">
                            <svg class="yith-wcwl-icon-svg" width="20" height="20" fill="none" stroke-width="1.6" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path></svg>
                        </a>
                    </span>
                </div>
            </form>

            <div class="product_meta">
                @if ($product->sku)<span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku }}</span></span>@endif
                <span class="posted_in">Categorías:
                    @foreach ($product->categories as $c)<a href="{{ route('category', $c->slug) }}" rel="tag">{{ $c->name }}</a>@endforeach
                </span>
                @if ($tags->count())
                    <span class="tagged_as">Tags: {{ $tags->join(', ') }}</span>
                @endif
            </div>

            @php
                $shareUrl = urlencode(route('product.show', $product->slug));
                $shareTxt = urlencode($product->name);
            @endphp
            <div class="zota-social-links">
                <a class="share-facebook" title="Compartir en Facebook" target="_blank" rel="noopener" href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5H17V3.6c-.3-.04-1.3-.13-2.46-.13-2.43 0-4.1 1.49-4.1 4.22V9.9H7.7V13h2.74v8h3.06Z"/></svg>
                </a>
                <a class="share-twitter" title="Compartir en X" target="_blank" rel="noopener" href="https://x.com/share?text={{ $shareTxt }}&url={{ $shareUrl }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.9 3h3.1l-6.77 7.74L22.5 21h-6.2l-4.86-6.35L5.9 21H2.78l7.24-8.28L1.5 3h6.36l4.4 5.82L17.9 3Zm-1.09 16.1h1.72L7.28 4.8H5.44l11.37 14.3Z"/></svg>
                </a>
                <a class="share-linkedin" title="Compartir en LinkedIn" target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?url={{ $shareUrl }}&title={{ $shareTxt }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.94 5a1.94 1.94 0 1 1-3.88 0 1.94 1.94 0 0 1 3.88 0ZM3.3 8.4h3.28V21H3.3V8.4Zm5.3 0h3.14v1.72h.05c.44-.83 1.5-1.72 3.1-1.72 3.32 0 3.93 2.18 3.93 5.02V21H18v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9.6V8.4Z"/></svg>
                </a>
                <a class="share-whatsapp" title="Compartir por WhatsApp" target="_blank" rel="noopener" href="https://api.whatsapp.com/send?text={{ $shareTxt }}%20{{ $shareUrl }}">
                    <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 3.2C8.9 3.2 3.2 9 3.2 16c0 2.26.6 4.46 1.72 6.4L3.2 28.8l6.56-1.71A12.7 12.7 0 0 0 16 28.8C23.1 28.8 28.8 23 28.8 16S23.1 3.2 16 3.2Zm0 23.04a10.2 10.2 0 0 1-5.2-1.42l-.37-.22-3.89 1.02 1.04-3.79-.24-.39A10.19 10.19 0 0 1 5.76 16 10.25 10.25 0 0 1 16 5.76 10.25 10.25 0 0 1 26.24 16 10.25 10.25 0 0 1 16 26.24Zm5.62-7.66c-.31-.16-1.82-.9-2.1-1-.28-.1-.49-.15-.69.15-.2.31-.79 1-.97 1.2-.18.21-.36.23-.66.08-.31-.15-1.3-.48-2.47-1.53-.91-.81-1.53-1.82-1.71-2.13-.18-.3-.02-.47.13-.62.14-.14.31-.36.46-.54.16-.18.2-.3.31-.51.1-.2.05-.38-.03-.54-.08-.15-.69-1.66-.94-2.28-.25-.6-.5-.51-.69-.52l-.59-.01c-.2 0-.53.08-.81.38-.28.31-1.07 1.05-1.07 2.56 0 1.51 1.1 2.97 1.25 3.17.15.2 2.16 3.3 5.24 4.63.73.32 1.3.5 1.75.65.73.23 1.4.2 1.93.12.59-.09 1.82-.74 2.07-1.46.26-.72.26-1.33.18-1.46-.07-.12-.28-.2-.59-.35Z"/></svg>
                </a>
                <a class="share-email" title="Compartir por email" href="mailto:?subject={{ $shareTxt }}&body={{ $shareUrl }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm9 7.06 8-5.06H4l8 5.06ZM4 8.2V17h16V8.2l-8 5.06L4 8.2Z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <div id="woocommerce-tabs" class="woocommerce-tabs wc-tabs-wrapper">
        <ul class="tabs wc-tabs nav nav-tabs" role="tablist">
            <li class="description_tab active"><a href="#tab-description">Descripción</a></li>
            <li class="reviews_tab"><a href="#tab-reviews">Valoraciones ({{ $product->reviews->count() }})</a></li>
        </ul>

        <div class="woocommerce-Tabs-panel panel entry-content wc-tab active" id="tab-description">
            {!! $product->description_html ?: '<p>' . e($product->short_description ?: 'Sin descripción.') . '</p>' !!}
        </div>

        <div class="woocommerce-Tabs-panel panel reviews wc-tab" id="tab-reviews">
            <div id="reviews" class="woocommerce-Reviews">
                <div id="comments">
                    <h2 class="woocommerce-Reviews-title">
                        {{ $product->reviews->count() }} valoraciones en <span>{{ $product->name }}</span>
                    </h2>

                    @if ($product->reviews->count())
                        <ol class="commentlist">
                            @foreach ($product->reviews->take(20) as $i => $review)
                                <li class="review {{ $i % 2 ? 'odd alt' : 'even' }} depth-1" id="li-comment-{{ $review->id }}">
                                    <div id="comment-{{ $review->id }}" class="comment_container">
                                        <img class="avatar avatar-60 photo" width="60" height="60" src="{{ asset('assets/img/review-avatar.jpg') }}" alt="{{ $review->reviewer }}" loading="lazy">
                                        <div class="comment-text">
                                            <div class="star-rating" role="img" aria-label="Valorado con {{ $review->rating }} de 5">
                                                <span style="width:{{ $review->rating / 5 * 100 }}%">Valorado con <strong class="rating">{{ $review->rating }}</strong> de 5</span>
                                            </div>
                                            <p class="meta">
                                                <strong class="woocommerce-review__author">{{ $review->reviewer }}</strong>
                                                @if ($review->verified)
                                                    <em class="woocommerce-review__verified verified">(propietario verificado)</em>
                                                @endif
                                                <span class="woocommerce-review__dash">&ndash;</span>
                                                <time class="woocommerce-review__published-date">{{ optional($review->reviewed_at)->translatedFormat('d \d\e F \d\e Y') }}</time>
                                            </p>
                                            <div class="description">{!! $review->review_html ?: '<p>' . e($review->review) . '</p>' !!}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="woocommerce-noreviews">Todavía no hay valoraciones.</p>
                    @endif
                </div>

                <div id="review_form_wrapper">
                    <div id="review_form">
                        <div id="respond" class="comment-respond">
                            <h3 class="comment-reply-title">Añade tu valoración</h3>
                            <form action="{{ route('product.review', $product->slug) }}" method="post" class="comment-form">
                                @csrf
                                <p class="comment-form-rating"><label>Tu puntuación&nbsp;*</label>
                                    <select name="rating" required>
                                        <option value="">Puntúa&hellip;</option>
                                        @for ($n = 5; $n >= 1; $n--)<option value="{{ $n }}">{{ $n }} de 5</option>@endfor
                                    </select>
                                </p>
                                <p class="comment-form-author"><label>Nombre&nbsp;*</label>
                                    <input type="text" name="reviewer" value="{{ old('reviewer') }}" required></p>
                                <p class="comment-form-comment"><label>Tu valoración&nbsp;*</label>
                                    <textarea name="review" cols="45" rows="6" required>{{ old('review') }}</textarea></p>
                                <p class="form-submit"><button type="submit" class="submit button">Enviar</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($related->count())
        <section class="related products">
            <h2 class="title-normal"><span>Productos relacionados</span></h2>
            <div class="display-products products products-grid">
                <div class="row" data-xlgdesktop="4" data-desktop="4" data-desktopsmall="3" data-tablet="3" data-landscape="2" data-mobile="2">
                    @foreach ($related as $rel)
                        @include('partials.wc-card', ['product' => $rel])
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>

<div class="tr-lb" id="tr-pdp-lightbox" hidden>
    <button type="button" class="tr-lb-close" aria-label="Cerrar">&times;</button>
    <button type="button" class="tr-lb-nav prev" aria-label="Anterior">&lsaquo;</button>
    <img src="" alt="" id="tr-lb-img">
    <button type="button" class="tr-lb-nav next" aria-label="Siguiente">&rsaquo;</button>
</div>

<script>
(function () {
    var GAL = @json($galleryUrls);
    var pdp = document.getElementById('product-{{ $pid }}');
    var main = document.getElementById('tr-pdp-main-img');
    if (pdp) {
        pdp.querySelectorAll('.tr-pdp-thumbs img').forEach(function (t) {
            t.addEventListener('click', function () {
                if (main) main.src = t.dataset.full || t.src;
                pdp.querySelectorAll('.tr-pdp-thumbs img').forEach(function (x) { x.classList.remove('is-active'); });
                t.classList.add('is-active');
            });
        });
    }

    /* Lightbox image principale */
    var lb = document.getElementById('tr-pdp-lightbox');
    var lbImg = document.getElementById('tr-lb-img');
    var zoom = document.getElementById('tr-pdp-zoom');
    var idx = 0;
    function openLb(i) {
        if (!lb || !GAL.length) return;
        idx = (i + GAL.length) % GAL.length;
        lbImg.src = GAL[idx];
        lb.hidden = false;
        document.body.style.overflow = 'hidden';
    }
    function closeLb() { if (lb) { lb.hidden = true; document.body.style.overflow = ''; } }
    if (zoom) zoom.addEventListener('click', function () {
        var cur = GAL.indexOf(main && main.getAttribute('src'));
        openLb(cur > -1 ? cur : 0);
    });
    if (lb) {
        lb.addEventListener('click', function (e) {
            if (e.target === lb || e.target.closest('.tr-lb-close')) return closeLb();
            if (e.target.closest('.tr-lb-nav.prev')) return openLb(idx - 1);
            if (e.target.closest('.tr-lb-nav.next')) return openLb(idx + 1);
        });
        document.addEventListener('keydown', function (e) {
            if (lb.hidden) return;
            if (e.key === 'Escape') closeLb();
            if (e.key === 'ArrowLeft') openLb(idx - 1);
            if (e.key === 'ArrowRight') openLb(idx + 1);
        });
    }
    /* Panier : on garantit qu'aucun clic (stepper +/- ou « Añadir al carrito »)
       ne recharge la page ni n'ouvre le panneau, même si shop-bridge.js tarde
       ou si un script du thème tente de soumettre le formulaire. */
    var cartForm = pdp && pdp.querySelector('form.cart');
    if (cartForm) {
        var qtyInput = cartForm.querySelector('.tr-qv-qty');

        cartForm.addEventListener('click', function (e) {
            var step = e.target.closest('.tr-qv-step');
            if (!step || !qtyInput) return;
            e.preventDefault();
            e.stopPropagation();
            var v = (parseInt(qtyInput.value, 10) || 1) + (parseInt(step.getAttribute('data-step'), 10) || 0);
            qtyInput.value = Math.min(99, Math.max(1, v));
        });

        cartForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = cartForm.querySelector('.single_add_to_cart_button');
            var token = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';
            var fd = new FormData(cartForm);
            fd.set('quantity', qtyInput ? (parseInt(qtyInput.value, 10) || 1) : 1);
            if (btn) btn.classList.add('loading');
            fetch(cartForm.getAttribute('action'), {
                method: 'POST',
                body: fd,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json', 'X-CSRF-TOKEN': token }
            })
                .then(function (r) { return r.ok ? r.json() : Promise.reject(r); })
                .then(function (d) {
                    if (btn) { btn.classList.remove('loading'); btn.classList.add('added'); }
                    document.querySelectorAll('.widget_shopping_cart_content, .tbay-topcart .dropdown-menu')
                        .forEach(function (c) { if (d && typeof d.html === 'string') c.innerHTML = d.html; });
                    document.querySelectorAll('.mini-cart-items, .cart-count, .count-cart, .tbay-mini-cart .count, .cart_count')
                        .forEach(function (n) { if (d && typeof d.count !== 'undefined') n.textContent = d.count; });
                    var t = document.getElementById('tr-toast') || (function () {
                        var x = document.createElement('div'); x.id = 'tr-toast'; document.body.appendChild(x); return x;
                    })();
                    t.textContent = (d && d.added ? '«' + d.added + '» ' : 'Producto ') + 'añadido a la cesta.';
                    t.classList.add('is-visible');
                    setTimeout(function () { t.classList.remove('is-visible'); }, 3200);
                })
                .catch(function () {
                    if (btn) btn.classList.remove('loading');
                    window.location.href = '{{ route('cart.index') }}';
                });
        });
    }

    var tabs = document.getElementById('woocommerce-tabs');
    if (tabs) {
        tabs.querySelectorAll('.wc-tabs a').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var id = a.getAttribute('href');
                tabs.querySelectorAll('.wc-tabs li').forEach(function (li) { li.classList.remove('active'); });
                a.parentNode.classList.add('active');
                tabs.querySelectorAll('.woocommerce-Tabs-panel').forEach(function (p) { p.classList.remove('active'); });
                var panel = tabs.querySelector(id);
                if (panel) panel.classList.add('active');
            });
        });
    }
})();
</script>
@endsection
