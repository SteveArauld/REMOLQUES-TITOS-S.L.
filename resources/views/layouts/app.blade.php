<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Remolques Titos — Remolques y maquinaria agrícola')</title>
    <meta name="description" content="@yield('meta_description', 'Fabricación de remolques agrícolas y maquinaria. Tractores, motoazadas, desbrozadoras, cortacéspedes, sopladores, trituradoras y remolques.')">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
<div class="topbar">
    <div class="container">
        <span>Envío gratis a partir de 500&nbsp;€ · Atención: L-V 9:00-18:00</span>
        <span>{{ config('mail.admin_address') }}</span>
    </div>
</div>

<header class="header">
    <div class="header__row container">
        <button class="menu-toggle" aria-label="Menú">&#9776;</button>
        <a href="{{ route('home') }}" class="logo"><img src="/assets/img/logo.png" alt="Remolques Titos" style="height:48px;width:auto;display:block"></a>

        <form class="search" action="{{ route('shop') }}" method="get">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar productos…" aria-label="Buscar">
            <button type="submit">Buscar</button>
        </form>

        <nav class="header__actions">
            <a href="{{ route('account') }}"><span class="ico">&#128100;</span>Mi cuenta</a>
            <a href="{{ route('wishlist') }}"><span class="ico">&#9825;</span>Favoritos (<span data-fav-count>0</span>)</a>
            <a href="{{ route('tracking.form') }}"><span class="ico">&#128230;</span>Seguimiento</a>
            <a href="{{ route('cart.index') }}" class="cart-link">
                <span class="ico">&#128722;</span>Cesta
                <span class="cart-badge">{{ $cart->count() }}</span>
            </a>
        </nav>
    </div>

    <nav class="nav">
        <ul class="nav__list">
            <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') && !request('categoria') ? 'is-active' : '' }}">Tienda</a></li>
            @foreach ($navCategories as $cat)
                <li>
                    <a href="{{ route('category', $cat->slug) }}"
                       class="{{ request('categoria') === $cat->slug || (isset($category) && $category?->id === $cat->id) ? 'is-active' : '' }}">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Contacto</a></li>
        </ul>
    </nav>
</header>

<main class="container" style="padding-top:1.5rem;padding-bottom:2rem">
    @if (session('status'))
        <div class="alert alert--ok">{{ session('status') }}</div>
    @endif
    @if ($errors->any() && ! isset($hideGlobalErrors))
        <div class="alert alert--err">
            <ul style="margin:0;padding-left:1.1rem">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="footer">
    <div class="container footer__cols">
        <div>
            <h4>Remolques Titos</h4>
            <p style="font-size:.88rem">Fabricación de remolques y de maquinaria agrícola; reparación de maquinaria
            agrícola, remolques y vehículos. Tractores, motoazadas, desbrozadoras, cortacéspedes, sopladores,
            trituradoras y remolques.</p>
            <p style="font-size:.8rem;opacity:.85">REMOLQUES TITOS S.L. · CIF B18392092<br>
            Avenida Los Emigrantes, s/n, 18560 Guadahortuna (Granada), Andalucía, España</p>
        </div>
        <div>
            <h4>Categorías</h4>
            <ul>
                @foreach ($navCategories->take(7) as $cat)
                    <li><a href="{{ route('category', $cat->slug) }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4>Ayuda</h4>
            <ul>
                <li><a href="{{ route('tracking.form') }}">Seguimiento de pedidos</a></li>
                <li><a href="{{ route('account') }}">Mi cuenta</a></li>
                <li><a href="{{ route('contact') }}">Contacto</a></li>
                <li><a href="{{ route('wishlist') }}">Favoritos</a></li>
            </ul>
        </div>
        <div>
            <h4>Legal</h4>
            <ul>
                <li><a href="{{ route('page', 'aviso-legal') }}">Aviso Legal</a></li>
                <li><a href="{{ route('page', 'politica-privacidad') }}">Política de privacidad</a></li>
                <li><a href="{{ route('page', 'terminos-y-condiciones') }}">Términos y condiciones</a></li>
                <li><a href="{{ route('page', 'politica-de-entregas') }}">Política de Envío</a></li>
                <li><a href="{{ route('page', 'politica-de-devoluciones-y-reembolsos') }}">Devoluciones y reembolsos</a></li>
            </ul>
        </div>
    </div>
    <div class="footer__bottom">© {{ date('Y') }} REMOLQUES TITOS S.L. · CIF B18392092 · Inscrita en el Registro Mercantil de Granada. Todos los derechos reservados.</div>
</footer>

<script src="{{ asset('assets/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
