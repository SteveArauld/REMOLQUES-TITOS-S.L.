{{-- Fil d'Ariane + titre de page, identique au site officiel --}}
<section id="tbay-breadcrumb" class="tbay-breadcrumb breadcrumbs-text active-nav-right show-title">
    <div class="container">
        <div class="breadscrumb-inner">
            <ol class="tbay-woocommerce-breadcrumb breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>{{ $title }}</li>
            </ol>
            <a href="javascript:history.back()" class="zota-back-btn"><i class="tb-icon tb-icon-angle-left"></i><span class="text">Página anterior</span></a>
        </div>
    </div>
</section>
<div class="title-not-breadcrumbs"><div class="container"><h1 class="page-title">{{ $title }}</h1></div></div>
