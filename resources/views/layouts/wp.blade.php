{{-- Layout EXACT depuis remolquestitos.com/index.html --}}
@verbatim
    <!DOCTYPE html>
    <html lang="es" class="no-js">



    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="google-site-verification" content="61mZwvVUq74GH9EiHo_j2z0v81cZuKUXfAzj0Gl5gDE" />

        <script>
            document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
        </script>
        <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />


        <link rel="stylesheet" href="/wp-content/fonts/fonts.css" media="all" />
@endverbatim
        {{-- ===== SEO par page (title / meta / canonical / Open Graph) ===== --}}
        @php
            $seoTitle = trim($__env->yieldContent('meta_title', 'Inicio - Remolques Titos'));
            $seoDesc  = trim($__env->yieldContent('meta_description', 'Fabricación y venta de remolques agrícolas, tractores, minitractores y maquinaria de jardín. Remolques Titos, fabricante en Guadahortuna (Granada) desde 1995.'));
            $seoCanonical = trim($__env->yieldContent('canonical', url()->current()));
            $seoImage = trim($__env->yieldContent('og_image', url('/wp-content/uploads/2024/03/Tractor-1.png')));
            $seoType  = trim($__env->yieldContent('og_type', 'website'));
        @endphp
        <title>{{ $seoTitle }}</title>
        <meta name="description" content="{{ $seoDesc }}" />
        <link rel="canonical" href="{{ $seoCanonical }}" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="{{ $seoType }}" />
        <meta property="og:title" content="{{ $seoTitle }}" />
        <meta name="twitter:title" content="{{ $seoTitle }}" />
        <meta name="twitter:description" content="{{ $seoDesc }}" />
        <meta name="twitter:image" content="{{ $seoImage }}" />
        @yield('head_extra')
        <meta property="og:description" content="{{ $seoDesc }}" />
        <meta property="og:url" content="{{ $seoCanonical }}" />
        <meta property="og:site_name" content="Remolques Titos" />
        <meta property="og:image" content="{{ $seoImage }}" />
        <meta name="twitter:card" content="summary_large_image" />
        @if(trim($__env->yieldContent('meta_title','Inicio - Remolques Titos')) === 'Inicio - Remolques Titos')
@verbatim
        <script type="application/ld+json" class="yoast-schema-graph">{"@context":"https:\/\/schema.org","@graph":[{"@type":"WebPage","@id":"\/","url":"\/","name":"Inicio - Remolques Titos","isPartOf":{"@id":"\/#website"},"about":{"@id":"\/#organization"},"primaryImageOfPage":{"@id":"\/#primaryimage"},"image":{"@id":"\/#primaryimage"},"thumbnailUrl":"\/wp-content\/uploads\/2024\/03\/Tractor-1.png","datePublished":"2020-12-22T01:46:09+00:00","dateModified":"2025-09-10T08:53:02+00:00","breadcrumb":{"@id":"\/#breadcrumb"},"inLanguage":"es","potentialAction":[{"@type":"ReadAction","target":["\/"]}]},{"@type":"ImageObject","inLanguage":"es","@id":"\/#primaryimage","url":"\/wp-content\/uploads\/2024\/03\/Tractor-1.png","contentUrl":"\/wp-content\/uploads\/2024\/03\/Tractor-1.png","width":390,"height":460},{"@type":"BreadcrumbList","@id":"\/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Inicio"}]},{"@type":"WebSite","@id":"\/#website","url":"\/","name":"Remolques Titos","description":"","publisher":{"@id":"\/#organization"},"potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"\/?s={search_term_string}"},"query-input":{"@type":"PropertyValueSpecification","valueRequired":true,"valueName":"search_term_string"}}],"inLanguage":"es"},{"@type":"Organization","@id":"\/#organization","name":"Remolques Titos","url":"\/","logo":{"@type":"ImageObject","inLanguage":"es","@id":"\/#\/schema\/logo\/image\/","url":"\/assets\/img\/logo.png","contentUrl":"\/assets\/img\/logo.png","width":567,"height":440,"caption":"Remolques Titos"},"image":{"@id":"\/#\/schema\/logo\/image\/"}}]}</script>
@endverbatim
        @endif
@verbatim









        <style id="wp-img-auto-sizes-contain-inline-css">
            img:is([sizes=auto i],[sizes^="auto," i]) {
                contain-intrinsic-size: 3000px 1500px
            }

            /*# sourceURL=wp-img-auto-sizes-contain-inline-css */
        </style>

        <link rel='stylesheet' id='easy-autocomplete-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/easy-autocomplete/easy-autocomplete.min8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='easy-autocomplete-theme-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/easy-autocomplete/easy-autocomplete.themes.min8b46.css?ver=3.3.4.5'
            media='all' />

        <style id="classic-theme-styles-inline-css">
            /*! This file is auto-generated */
            .wp-block-button__link {
                color: #fff;
                background-color: #32373c;
                border-radius: 9999px;
                box-shadow: none;
                text-decoration: none;
                padding: calc(.667em + 2px) calc(1.333em + 2px);
                font-size: 1.125em
            }

            .wp-block-file__button {
                background: #32373c;
                color: #fff;
                text-decoration: none
            }

            /*# sourceURL=/wp-includes/css/classic-themes.min.css */
        </style>
        <link rel='stylesheet' id='jquery-selectBox-css'
            href='/wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0'
            media='all' />
        <link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'
            href='/wp-content/plugins/woocommerce/assets/css/prettyPhoto005e.css?ver=3.1.6' media='all' />
        <link rel='stylesheet' id='yith-wcwl-main-css'
            href='/wp-content/plugins/yith-woocommerce-wishlist/assets/css/styleba25.css?ver=4.17.0' media='all' />
        <style id="yith-wcwl-main-inline-css">
            :root {
                --rounded-corners-radius: 16px;
                --add-to-cart-rounded-corners-radius: 16px;
                --color-headers-background: #F4F4F4;
                --feedback-duration: 3s
            }

            :root {
                --rounded-corners-radius: 16px;
                --add-to-cart-rounded-corners-radius: 16px;
                --color-headers-background: #F4F4F4;
                --feedback-duration: 3s
            }

            /*# sourceURL=yith-wcwl-main-inline-css */
        </style>
        <style id="global-styles-inline-css">
            :root {
                --wp--preset--aspect-ratio--square: 1;
                --wp--preset--aspect-ratio--4-3: 4/3;
                --wp--preset--aspect-ratio--3-4: 3/4;
                --wp--preset--aspect-ratio--3-2: 3/2;
                --wp--preset--aspect-ratio--2-3: 2/3;
                --wp--preset--aspect-ratio--16-9: 16/9;
                --wp--preset--aspect-ratio--9-16: 9/16;
                --wp--preset--color--black: #000000;
                --wp--preset--color--cyan-bluish-gray: #abb8c3;
                --wp--preset--color--white: #ffffff;
                --wp--preset--color--pale-pink: #f78da7;
                --wp--preset--color--vivid-red: #cf2e2e;
                --wp--preset--color--luminous-vivid-orange: #ff6900;
                --wp--preset--color--luminous-vivid-amber: #fcb900;
                --wp--preset--color--light-green-cyan: #7bdcb5;
                --wp--preset--color--vivid-green-cyan: #00d084;
                --wp--preset--color--pale-cyan-blue: #8ed1fc;
                --wp--preset--color--vivid-cyan-blue: #0693e3;
                --wp--preset--color--vivid-purple: #9b51e0;
                --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgb(6, 147, 227) 0%, rgb(155, 81, 224) 100%);
                --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
                --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgb(252, 185, 0) 0%, rgb(255, 105, 0) 100%);
                --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgb(255, 105, 0) 0%, rgb(207, 46, 46) 100%);
                --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
                --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
                --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
                --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
                --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
                --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
                --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
                --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
                --wp--preset--font-size--small: 13px;
                --wp--preset--font-size--medium: 20px;
                --wp--preset--font-size--large: 36px;
                --wp--preset--font-size--x-large: 42px;
                --wp--preset--spacing--20: 0.44rem;
                --wp--preset--spacing--30: 0.67rem;
                --wp--preset--spacing--40: 1rem;
                --wp--preset--spacing--50: 1.5rem;
                --wp--preset--spacing--60: 2.25rem;
                --wp--preset--spacing--70: 3.38rem;
                --wp--preset--spacing--80: 5.06rem;
                --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
                --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);
                --wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);
            }

            .wp-block-button {
                --wp--preset--dimension--25: 25%;
                --wp--preset--dimension--50: 50%;
                --wp--preset--dimension--75: 75%;
                --wp--preset--dimension--100: 100%;
            }

            :where(body) {
                margin: 0;
            }

            :where(.is-layout-flex) {
                gap: 0.5em;
            }

            :where(.is-layout-grid) {
                gap: 0.5em;
            }

            body .is-layout-flex {
                display: flex;
            }

            .is-layout-flex {
                flex-wrap: wrap;
                align-items: center;
            }

            .is-layout-flex> :is(*, div) {
                margin: 0;
            }

            body .is-layout-grid {
                display: grid;
            }

            .is-layout-grid> :is(*, div) {
                margin: 0;
            }

            body {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
            }

            :root :where(.wp-element-button, .wp-block-button__link) {
                background-color: #32373c;
                border-width: 0;
                color: #fff;
                font-family: inherit;
                font-size: inherit;
                font-style: inherit;
                font-weight: inherit;
                letter-spacing: inherit;
                line-height: inherit;
                padding-top: calc(0.667em + 2px);
                padding-right: calc(1.333em + 2px);
                padding-bottom: calc(0.667em + 2px);
                padding-left: calc(1.333em + 2px);
                text-decoration: none;
                text-transform: inherit;
            }

            .has-black-color {
                color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-color {
                color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-color {
                color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-color {
                color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-color {
                color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-color {
                color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-color {
                color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-color {
                color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-color {
                color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-color {
                color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-color {
                color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-color {
                color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-background-color {
                background-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-background-color {
                background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-background-color {
                background-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-background-color {
                background-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-background-color {
                background-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-background-color {
                background-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-background-color {
                background-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-background-color {
                background-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-background-color {
                background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-background-color {
                background-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-border-color {
                border-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-border-color {
                border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-border-color {
                border-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-border-color {
                border-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-border-color {
                border-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-border-color {
                border-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-border-color {
                border-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-border-color {
                border-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-border-color {
                border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-border-color {
                border-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
                background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
            }

            .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
                background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
            }

            .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-orange-to-vivid-red-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
            }

            .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
                background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
            }

            .has-cool-to-warm-spectrum-gradient-background {
                background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
            }

            .has-blush-light-purple-gradient-background {
                background: var(--wp--preset--gradient--blush-light-purple) !important;
            }

            .has-blush-bordeaux-gradient-background {
                background: var(--wp--preset--gradient--blush-bordeaux) !important;
            }

            .has-luminous-dusk-gradient-background {
                background: var(--wp--preset--gradient--luminous-dusk) !important;
            }

            .has-pale-ocean-gradient-background {
                background: var(--wp--preset--gradient--pale-ocean) !important;
            }

            .has-electric-grass-gradient-background {
                background: var(--wp--preset--gradient--electric-grass) !important;
            }

            .has-midnight-gradient-background {
                background: var(--wp--preset--gradient--midnight) !important;
            }

            .has-small-font-size {
                font-size: var(--wp--preset--font-size--small) !important;
            }

            .has-medium-font-size {
                font-size: var(--wp--preset--font-size--medium) !important;
            }

            .has-large-font-size {
                font-size: var(--wp--preset--font-size--large) !important;
            }

            .has-x-large-font-size {
                font-size: var(--wp--preset--font-size--x-large) !important;
            }

            :root :where(.wp-block-icon svg) {
                width: 24px;
            }

            :where(.wp-block-gallery.is-layout-flex) {
                gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
            }

            :where(.wp-block-gallery.is-layout-grid) {
                gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
            }

            :where(.wp-block-latest-posts.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-latest-posts.is-layout-grid) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-grid) {
                gap: 1.25em;
            }

            :where(.wp-block-term-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-term-template.is-layout-grid) {
                gap: 1.25em;
            }

            :where(.wp-block-columns.is-layout-flex) {
                gap: 2em;
            }

            :where(.wp-block-columns.is-layout-grid) {
                gap: 2em;
            }

            :root :where(.wp-block-pullquote) {
                font-size: 1.5em;
                line-height: 1.6;
            }

            /*# sourceURL=global-styles-inline-css */
        </style>
        <link rel='stylesheet' id='woof-css'
            href='/wp-content/plugins/woocommerce-products-filter/css/front8b46.css?ver=3.3.4.5' media='all' />
        <style id="woof-inline-css">
            .woof_products_top_panel li span,
            .woof_products_top_panel2 li span {
                background: url(/wp-content/plugins/woocommerce-products-filter/img/delete.png);
                background-size: 14px 14px;
                background-repeat: no-repeat;
                background-position: right;
            }

            .woof_edit_view {
                display: none;
            }

            .woof_price_search_container .price_slider_amount button.button {
                display: none;
            }

            /***** END: hiding submit button of the price slider ******/


            /*# sourceURL=woof-inline-css */
        </style>
        <link rel='stylesheet' id='chosen-drop-down-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/chosen/chosen.min8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='icheck-jquery-color-flat-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/icheck/skins/flat/_all8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='icheck-jquery-color-square-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/icheck/skins/square/_all8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='icheck-jquery-color-minimal-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/icheck/skins/minimal/_all8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_author_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_author/css/by_author8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_backorder_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_backorder/css/by_backorder8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_featured_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_featured/css/by_featured8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_instock_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_instock/css/by_instock8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_onsales_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_onsales/css/by_onsales8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_sku_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_sku/css/by_sku8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_by_text_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/by_text/assets/css/front8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_color_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/color/css/html_types/color8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_image_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/image/css/html_types/image8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_label_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/label/css/html_types/label8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_select_hierarchy_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/select_hierarchy/css/html_types/select_hierarchy8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_select_radio_check_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/select_radio_check/css/html_types/select_radio_check8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_slider_html_items-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/slider/css/html_types/slider8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_checkbox-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/elements/checkbox8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_radio-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/elements/radio8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_switcher-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/elements/switcher8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_color-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/elements/color8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_tooltip-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/tooltip8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_sd_html_items_front-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/css/front8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof-switcher23-css'
            href='/wp-content/plugins/woocommerce-products-filter/css/switcher8b46.css?ver=3.3.4.5' media='all' />
        <link rel='stylesheet' id='woocommerce-layout-css'
            href='/wp-content/plugins/woocommerce/assets/css/woocommerce-layout5ae7.css?ver=11.0.1' media='all' />
        <link rel='stylesheet' id='woocommerce-smallscreen-css'
            href='/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen5ae7.css?ver=11.0.1'
            media='only screen and (max-width: 768px)' />
        <link rel='stylesheet' id='woocommerce-general-css'
            href='/wp-content/plugins/woocommerce/assets/css/woocommerce5ae7.css?ver=11.0.1' media='all' />
        <style id="woocommerce-inline-inline-css">
            .woocommerce form .form-row .required {
                visibility: visible;
            }

            /*# sourceURL=woocommerce-inline-inline-css */
        </style>
        <link rel='stylesheet' id='woo-variation-swatches-css'
            href='/wp-content/plugins/woo-variation-swatches/assets/css/frontend.min8d5a.css?ver=2.4.0' media='all' />
        <style id="woo-variation-swatches-inline-css">
            :root {
                --wvs-tick: url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 2px rgb(0 0 0 / .8))' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 30 30'%3E%3Cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='M4 16L11 23 27 7'/%3E%3C/svg%3E");

                --wvs-cross: url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 5px rgb(255 255 255 / .6))' xmlns='http://www.w3.org/2000/svg' width='72px' height='72px' viewBox='0 0 24 24'%3E%3Cpath fill='none' stroke='%23ff0000' stroke-linecap='round' stroke-width='0.6' d='M5 5L19 19M19 5L5 19'/%3E%3C/svg%3E");
                --wvs-single-product-item-width: 30px;
                --wvs-single-product-item-height: 30px;
                --wvs-single-product-item-font-size: 16px
            }

            /*# sourceURL=woo-variation-swatches-inline-css */
        </style>

        <link rel='stylesheet' id='elementor-frontend-css'
            href='/wp-content/plugins/elementor/assets/css/frontend.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='elementor-post-6-css' href='/wp-content/uploads/elementor/css/post-61e61.css'
            media='all' />
        <link rel='stylesheet' id='font-awesome-5-all-css'
            href='/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='font-awesome-4-shim-css'
            href='/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min9c92.css?ver=4.2.3'
            media='all' />
    @endverbatim
    @yield('elementor_css')
    @verbatim
        <link rel='stylesheet' id='bootstrap-css' href='/wp-content/themes/zota/css/bootstrap5b31.css?ver=4.3.1'
            media='all' />
        <link rel='stylesheet' id='zota-template-css' href='/wp-content/themes/zota/css/template5152.css?ver=1.0'
            media='all' />
        <link rel='stylesheet' id='zota-skin-css'
            href='/wp-content/themes/zota/css/skins/electronics/type5152.css?ver=1.0' media='all' />
        <link rel='stylesheet' id='zota-style-css' href='/wp-content/themes/zota/style5152.css?ver=1.0'
            media='all' />
        <style id="zota-style-inline-css">
            :root {
                --tb-theme-color: #24c200;
                --tb-theme-color-hover: #22b800;
                --tb-header-mobile-bg: #ffffff;
                --tb-header-mobile-color: #000000;
                --tb-theme-color-buy-now: #1d1d1d;
                --tb-theme-bg-buy-now: #ffca3a;
                --tb-theme-bg-buy-now-hover: #f2bf37;
            }

            :root {
                --tb-text-primary-font: Rubik, sans-serif;
            }

            /* Theme Options Styles */
            .checkout-logo img {
                max-width: 120px;
            }

            @media (max-width: 1199px) {

                /* Limit logo image height for mobile according to mobile header height */
                .mobile-logo a img {
                    width: 69px;
                }
            }

            @media screen and (max-width: 782px) {
                html body.admin-bar {
                    top: -46px !important;
                    position: relative;
                }
            }

            /* Custom CSS */
            .woocommerce-review__published-date {
                display: none !important;
            }

            .rate-sold {
                display: none !important;
            }

            /*# sourceURL=zota-style-inline-css */
        </style>
        <style id="tr-bridge-css">
        /* Notification d'ajout au panier */
        #tr-toast{position:fixed;top:24px;right:24px;z-index:100000;max-width:320px;background:#fff;color:#1d1d1d;
            border-left:4px solid var(--tb-theme-color,#24c200);box-shadow:0 8px 30px rgba(0,0,0,.18);border-radius:4px;
            padding:14px 18px;font-size:14px;line-height:1.4;opacity:0;transform:translateY(-12px);
            transition:opacity .25s,transform .25s;pointer-events:none}
        #tr-toast.is-visible{opacity:1;transform:translateY(0)}

        /* Favori actif : le thème met une pastille verte -> on garde le coeur BLANC et visible */
        .product-block .button-wishlist.exists a,
        .product-block .yith-wcwl-add-to-wishlist.exists a{color:#fff !important}
        .product-block .button-wishlist.exists svg,
        .product-block .yith-wcwl-add-to-wishlist.exists svg,
        .product-block [data-fav-toggle].is-active svg{fill:#fff !important;stroke:#fff !important}
        /* Sur la fiche produit (lien texte simple, pas de pastille) : coeur vert */
        .single-product .add_to_wishlist.is-active{color:var(--tb-theme-color,#24c200) !important}

        /* Bouton "Ajouter au panier" quand le produit est déjà dans la cesta */
        .add_to_cart_button.in-cart,
        .single_add_to_cart_button.in-cart{
            background-color:var(--tb-theme-color,#24c200) !important;
            border-color:var(--tb-theme-color,#24c200) !important;
            color:#fff !important;
        }
        .product-block .add-cart .add_to_cart_button.in-cart i{color:#fff !important}

        /* Mini-panier : respiration + scrollbar visible (sinon on ne voit pas qu'on peut défiler) */
        .tbay-dropdown-cart .mcart-border ul.product_list_widget{padding:4px 12px 4px 2px;scrollbar-width:thin}
        .tbay-dropdown-cart .mcart-border ul.product_list_widget::-webkit-scrollbar{display:block;width:6px}
        .tbay-dropdown-cart .mcart-border ul.product_list_widget::-webkit-scrollbar-thumb{background:#d0d0d0;border-radius:3px}
        .tbay-dropdown-cart .cart_list li.mini_cart_item{display:block !important;width:100%;padding:16px 0 !important;margin:0 !important;border-bottom:1px solid #ebebeb}
        .tbay-dropdown-cart .cart_list li.mini_cart_item:first-child{padding-top:4px !important}
        .tbay-dropdown-cart .woocommerce-mini-cart>.mini_cart_item>a img{max-width:60px;height:60px;object-fit:cover}
        /* Sélecteur de quantité dans le mini-panier */
        .tbay-dropdown-cart .mini-qty{display:flex;align-items:center;gap:8px;margin-top:10px}
        .tbay-dropdown-cart .mini-qty-btn{width:26px;height:26px;line-height:24px;text-align:center;border:1px solid #d9d9d9;
            background:#fff;color:#333;font-size:15px;border-radius:4px;cursor:pointer;padding:0;flex:0 0 auto}
        .tbay-dropdown-cart .mini-qty-btn:hover{border-color:var(--tb-theme-color,#24c200);color:var(--tb-theme-color,#24c200)}
        .tbay-dropdown-cart .mini-qty-val{min-width:24px;text-align:center;font-weight:600;font-size:14px}
        .tbay-dropdown-cart .mini-qty-price{margin-left:auto;color:var(--tb-theme-color,#24c200);font-weight:600;font-size:14px}
        .tbay-dropdown-cart .mini-qty.is-loading{opacity:.5;pointer-events:none}

        /* ===== Modale Vista rápida (autonome, sans dépendance Bootstrap) ===== */
        .tr-qv-overlay{position:fixed;inset:0;z-index:100050;background:rgba(0,0,0,.6);
            display:flex;align-items:flex-start;justify-content:center;padding:40px 16px;overflow-y:auto}
        .tr-qv-overlay[hidden]{display:none}
        .tr-qv-dialog{position:relative;background:#fff;width:100%;max-width:900px;border-radius:6px;
            box-shadow:0 20px 60px rgba(0,0,0,.35);margin:auto}
        .tr-qv-close{position:absolute;top:10px;right:14px;z-index:2;border:0;background:transparent;
            font-size:26px;line-height:1;color:#888;cursor:pointer;padding:4px 8px}
        .tr-qv-close:hover{color:var(--tb-theme-color,#24c200)}
        .tr-qv-body{padding:0}
        .tr-qv-body .qv-loading{padding:60px;text-align:center;color:#888}
        .tr-qv-body img{max-width:100%;height:auto}
        .tr-qv{display:flex;flex-wrap:wrap;padding:40px 32px 32px;gap:32px}
        .tr-qv-media{flex:0 0 42%;max-width:42%;min-width:0}
        .tr-qv-info{flex:1 1 0;min-width:0}
        .tr-qv-main{width:100%;aspect-ratio:1/1;border:1px solid #ececec;background:#fafafa;
            display:flex;align-items:center;justify-content:center;overflow:hidden}
        .tr-qv-main img{width:100%;height:100%;object-fit:contain}
        .tr-qv-thumbs{display:flex;gap:8px;margin-top:10px;flex-wrap:wrap}
        .tr-qv-thumbs img{width:56px;height:56px;object-fit:cover;cursor:pointer;border:1px solid #e0e0e0;opacity:.75;transition:.2s}
        .tr-qv-thumbs img:hover,.tr-qv-thumbs img.is-active{opacity:1;border-color:var(--tb-theme-color,#24c200)}
        .tr-qv-title{font-size:22px;line-height:1.3;margin:0 0 12px;font-weight:600}
        .tr-qv-rating{margin-bottom:10px;font-size:13px;color:#888}
        .tr-qv-price{font-size:20px;font-weight:600;margin:10px 0;color:var(--tb-theme-color,#24c200)}
        .tr-qv-price del{opacity:.5;font-size:.8em;font-weight:400;margin-left:8px;color:#666}
        .tr-qv-price ins{text-decoration:none}
        .tr-qv-price .woocommerce-price-suffix{display:block;font-size:.6em;opacity:.7;font-weight:400;color:#666;margin-top:2px}
        .tr-qv-desc{color:#707070;font-size:14px;line-height:1.6;margin:14px 0 20px;max-height:190px;overflow:auto}
        .tr-qv-desc *{font-size:14px !important;line-height:1.6 !important;color:#707070 !important;margin:0 0 8px}
        .tr-qv-actions{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
        .tr-qv-stepper{display:inline-flex !important;align-items:center;border:1px solid #d9d9d9;border-radius:4px;overflow:hidden;width:auto !important;background:#fff}
        .tr-qv-step{width:38px !important;min-width:38px;height:44px;border:0 !important;background:#f6f6f6 !important;font-size:17px;cursor:pointer;color:#333;margin:0 !important;padding:0 !important;box-shadow:none !important;border-radius:0 !important}
        .tr-qv-step:hover{background:var(--tb-theme-color,#24c200);color:#fff}
        .tr-qv-qty{width:46px !important;min-width:46px;height:44px;text-align:center;border:0 !important;border-left:1px solid #d9d9d9 !important;border-right:1px solid #d9d9d9 !important;font-weight:600;background:#fff !important;padding:0 !important;margin:0 !important;border-radius:0 !important;box-shadow:none !important}
        .tr-qv-actions .button{height:44px;line-height:44px;padding:0 24px;white-space:nowrap}
        .tr-qv-more{margin:16px 0 0}
        .tr-qv-more a{color:var(--tb-theme-color,#24c200);font-weight:500}
        @media (max-width:768px){
            .tr-qv{padding:44px 18px 22px;gap:18px}
            .tr-qv-media,.tr-qv-info{flex-basis:100%;max-width:100%}
        }

        /* ===== Mode LISTE : boutons visibles avec libellés (comme le site officiel) ===== */
        .display-products.products-list .product-block{display:block;padding:24px 0;border-bottom:1px solid #ebebeb}
        .display-products.products-list .product-block .product-content{display:flex !important;gap:26px;align-items:flex-start;flex-direction:row !important;max-width:100%}

        /* Colonne image : cadre fixe, image toujours contenue */
        .display-products.products-list .product-block .block-inner{flex:0 0 210px;max-width:210px;position:relative;margin:0}
        .display-products.products-list .product-block .block-inner .image,
        .display-products.products-list .product-block .block-inner figure.image{margin:0;width:100%;height:auto}
        .display-products.products-list .product-block .block-inner .product-image{display:block;position:relative;width:100%;height:210px;
            border:1px solid #ececec;background:#fafafa;overflow:hidden}
        .display-products.products-list .product-block .block-inner .product-image img{width:100%;height:100%;object-fit:contain}
        .display-products.products-list .product-block .block-inner .image-hover{position:absolute;inset:0;opacity:0;transition:opacity .3s}
        .display-products.products-list .product-block:hover .block-inner .image-hover{opacity:1}

        /* Colonne contenu : EMPILEMENT vertical strict — le prix reste toujours en haut */
        .display-products.products-list .product-block .caption{display:block !important;flex:1 1 0;min-width:0;padding:0;margin:0;text-align:left}
        .display-products.products-list .product-block .caption > *{float:none;position:static;width:auto;max-width:100%}
        .display-products.products-list .product-block .caption .name{display:block;font-size:16px;line-height:1.4;margin:0 0 8px !important;
            white-space:normal;overflow:visible;margin-right:0 !important}
        .display-products.products-list .product-block .caption .name a{white-space:normal}
        .display-products.products-list .product-block .caption .rating{display:block;margin:0 0 8px}
        .display-products.products-list .product-block .caption .price{display:block;margin:0 0 12px !important;font-size:18px;font-weight:600}
        .display-products.products-list .product-block .caption .woocommerce-product-details__short-description{display:block;margin:0 0 16px;
            color:#666;font-size:13px;line-height:1.65;max-height:5em;overflow:hidden}
        .display-products.products-list .product-block .caption .woocommerce-product-details__short-description *{font-size:13px !important;line-height:1.65 !important;margin:0}
        .display-products.products-list .product-block .group-buttons{clear:both;position:static !important;opacity:1 !important;visibility:visible !important;
            transform:none !important;display:flex !important;flex-wrap:wrap;gap:10px;margin-top:4px;justify-content:flex-start;background:none;padding:0}
        .display-products.products-list .product-block .group-buttons>div{display:inline-flex !important;position:static;margin:0}
        .display-products.products-list .product-block .group-buttons>div a{display:inline-flex;align-items:center;gap:8px;
            height:40px;padding:0 16px;border:1px solid #d9d9d9;border-radius:4px;background:#fff;color:#333;
            font-size:13px;font-weight:500;line-height:1;white-space:nowrap;width:auto;min-width:0}
        .display-products.products-list .product-block .group-buttons>div a:hover{border-color:var(--tb-theme-color,#24c200);color:var(--tb-theme-color,#24c200)}
        .display-products.products-list .product-block .group-buttons>div a span,
        .display-products.products-list .product-block .group-buttons>div a .title-cart{display:inline !important;font-size:13px;color:inherit}
        .display-products.products-list .product-block .group-buttons>div a i{display:inline-block !important;font-size:16px;margin:0}
        .display-products.products-list .product-block .group-buttons>div a svg{width:16px;height:16px;margin:0}
        .display-products.products-list .product-block .group-buttons .add-cart a{background:var(--tb-theme-color,#24c200);border-color:var(--tb-theme-color,#24c200);color:#fff}
        .display-products.products-list .product-block .group-buttons .add-cart a:hover{background:var(--tb-theme-color-hover,#22b800);color:#fff}
        .display-products.products-list .product-block .group-buttons .add_to_cart_button.in-cart{background:var(--tb-theme-color,#24c200);color:#fff}
        .display-products.products-list .product-block .onsale{top:8px;left:8px}

        /* --- États actifs en mode LISTE (favori activé / panier en cours) --- */
        .display-products.products-list .product-block .button-wishlist.exists a,
        .display-products.products-list .product-block .yith-wcwl-add-to-wishlist.exists a,
        .display-products.products-list .product-block [data-fav-toggle].is-active{
            color:var(--tb-theme-color,#24c200) !important;
            background:#eafbe6 !important;
            border-color:var(--tb-theme-color,#24c200) !important;
        }
        .display-products.products-list .product-block .button-wishlist.exists svg,
        .display-products.products-list .product-block .yith-wcwl-add-to-wishlist.exists svg,
        .display-products.products-list .product-block [data-fav-toggle].is-active svg{
            fill:var(--tb-theme-color,#24c200) !important;
            stroke:var(--tb-theme-color,#24c200) !important;
        }
        .display-products.products-list .product-block .group-buttons .add-cart a.loading,
        .display-products.products-list .product-block .group-buttons .add-cart a.added{
            display:inline-flex !important;align-items:center;gap:8px;
            height:40px;padding:0 16px;width:auto;min-width:0;border-radius:4px;
            background:var(--tb-theme-color,#24c200) !important;border:1px solid var(--tb-theme-color,#24c200) !important;color:#fff !important;
        }
        .display-products.products-list .product-block .group-buttons .add-cart a.loading::before,
        .display-products.products-list .product-block .group-buttons .add-cart a.loading::after,
        .display-products.products-list .product-block .group-buttons .add-cart a.added::before,
        .display-products.products-list .product-block .group-buttons .add-cart a.added::after,
        .display-products.products-list .product-block .group-buttons .add-cart a::after{
            content:none !important;display:none !important;
        }
        .display-products.products-list .product-block .group-buttons .add-cart a.loading{opacity:.7;pointer-events:none}
        .display-products.products-list .product-block .group-buttons .add-cart a.added i,
        .display-products.products-list .product-block .group-buttons .add-cart a.added .title-cart{display:inline !important;color:#fff !important}

        @media (max-width:600px){
            .display-products.products-list .product-block{flex-direction:column}
            .display-products.products-list .product-block .block-inner{flex-basis:auto;max-width:220px}
        }

        /* ===== Fiche produit (comme le site officiel) ===== */
        .singular-shop .tr-pdp{display:flex;flex-wrap:wrap;gap:48px;margin:8px 0 40px}
        .tr-pdp .tr-pdp-gallery{flex:0 0 46%;max-width:46%;position:relative}
        .tr-pdp .summary{flex:1 1 0;min-width:0}
        .tr-pdp .tr-pdp-gallery .onsale{position:absolute;top:14px;left:14px;z-index:3;background:var(--tb-theme-color,#24c200);color:#fff;
            border-radius:3px;padding:4px 9px;font-size:13px;line-height:1;font-weight:600}
        .tr-pdp .tr-pdp-main{position:relative;width:100%;padding:0;border:1px solid #ececec;background:#fafafa;aspect-ratio:1/1;
            display:flex;align-items:center;justify-content:center;overflow:hidden;cursor:zoom-in}
        .tr-pdp .tr-pdp-main img{width:100%;height:100%;object-fit:contain}
        .tr-pdp .tr-pdp-main .tr-pdp-zoom-ico{position:absolute;right:12px;bottom:12px;width:36px;height:36px;border-radius:50%;
            background:rgba(0,0,0,.55);color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px}
        .tr-pdp .tr-pdp-thumbs{display:flex;gap:10px;margin-top:12px;flex-wrap:wrap}
        .tr-pdp .tr-pdp-thumbs img{width:72px;height:72px;object-fit:contain;background:#fff;border:1px solid #dcdcdc;cursor:pointer;opacity:.7;transition:.2s}
        .tr-pdp .tr-pdp-thumbs img:hover,.tr-pdp .tr-pdp-thumbs img.is-active{opacity:1;border-color:var(--tb-theme-color,#24c200)}
        .tr-pdp .summary .product_title{font-size:26px;line-height:1.25;margin:0 0 10px;font-weight:600}
        .tr-pdp .summary .zota-single-product-title-main{border-bottom:1px solid #dcdcdc;padding-bottom:16px;margin-bottom:20px}
        .tr-pdp .summary .woocommerce-product-rating{display:flex;align-items:center;gap:12px;font-size:13px}
        .tr-pdp .summary .woocommerce-review-link{color:#888}
        .tr-pdp .summary .price{font-size:30px;font-weight:700;line-height:1.2;color:var(--tb-theme-color,#24c200);margin:0 0 18px}
        .tr-pdp .summary .price ins,
        .tr-pdp .summary .price ins .woocommerce-Price-amount{display:inline;text-decoration:none;font-size:30px}
        .tr-pdp .summary .price del,
        .tr-pdp .summary .price del .woocommerce-Price-amount{display:inline;font-weight:400;font-size:18px;color:#9a9a9a;margin-left:12px}
        .tr-pdp .summary .price .woocommerce-price-suffix{display:inline;font-size:12px;font-weight:400;color:#888;margin-left:10px;white-space:nowrap}
        .tr-pdp .summary .woocommerce-product-details__short-description{color:#5f5f5f;font-size:14px;line-height:1.65;margin:0 0 18px}
        .tr-pdp .summary .woocommerce-product-details__short-description h3{font-size:16px;margin:0 0 8px;color:#1d1d1d}
        .tr-pdp-flag{margin:6px 0;font-size:15px;font-weight:600}
        .tr-pdp-flag.ok{color:#2e7d32}
        .tr-pdp-flag.ko{color:#c62828}
        .tr-pdp-flag.ship{color:#045a8d}
        .tr-pdp .summary form.cart{margin:22px 0 0}
        .tr-pdp #shop-now{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
        .tr-pdp #shop-now .single_add_to_cart_button{height:48px;line-height:48px;padding:0 30px;font-size:15px}
        .tr-pdp #shop-now .tr-qv-stepper .tr-qv-step{height:48px}
        .tr-pdp #shop-now .tr-qv-stepper .tr-qv-qty{height:48px}
        .tr-pdp #shop-now .button-wishlist a{display:inline-flex;align-items:center;justify-content:center;width:48px;height:48px;
            border:1px solid #d9d9d9;border-radius:4px;color:#666}
        .tr-pdp #shop-now .button-wishlist a:hover,.tr-pdp #shop-now .button-wishlist a.is-active{border-color:var(--tb-theme-color,#24c200);color:var(--tb-theme-color,#24c200)}
        .tr-pdp #shop-now .button-wishlist a.is-active svg{fill:var(--tb-theme-color,#24c200)}
        .tr-pdp .product_meta{margin-top:22px;padding-top:18px;border-top:1px solid #eee;font-size:13px;color:#777;line-height:2}
        .tr-pdp .product_meta>span{display:block}
        .tr-pdp .product_meta a{color:#777}
        .tr-pdp .product_meta a:hover{color:var(--tb-theme-color,#24c200)}

        .singular-shop #woocommerce-tabs{margin:10px 0 40px;clear:both}
        .singular-shop #woocommerce-tabs .wc-tabs{display:flex;gap:0;list-style:none;margin:0 0 24px;padding:0;border-bottom:2px solid #ececec}
        .singular-shop #woocommerce-tabs .wc-tabs li{margin:0}
        .singular-shop #woocommerce-tabs .wc-tabs li a{display:block;padding:12px 22px;color:#666;font-weight:600;font-size:15px;text-decoration:none}
        .singular-shop #woocommerce-tabs .wc-tabs li.active a{color:var(--tb-theme-color,#24c200);box-shadow:0 2px 0 var(--tb-theme-color,#24c200)}
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel{display:none}
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel.active{display:block}
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel table{width:100%;border-collapse:collapse;margin:0 0 16px}
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel table th,
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel table td{border:1px solid #e5e5e5;padding:10px 14px;text-align:left;font-size:14px;vertical-align:top}
        .singular-shop #woocommerce-tabs .woocommerce-Tabs-panel table th{background:#f7f7f7;width:38%;font-weight:600}
        /* Valoraciones — calqué sur le site officiel */
        .singular-shop #reviews .woocommerce-Reviews-title{font-size:20px;font-weight:500;line-height:1.4;margin:0 0 6px;color:#000}
        .singular-shop #reviews .woocommerce-Reviews-title span{font-weight:600}
        .singular-shop #reviews #comments ol.commentlist{list-style:none;margin:22px 0 0;padding:16px 0 0;border-top:1px solid #eaeaea}
        .singular-shop #reviews #comments ol.commentlist li.review{padding:0 0 24px;margin:0 0 22px;border-bottom:1px solid #eaeaea}
        .singular-shop #reviews #comments ol.commentlist li.review:last-child{border-bottom:0;margin-bottom:0}
        .singular-shop #reviews #comments ol.commentlist .comment_container{position:relative;padding:0 0 0 80px;min-height:60px}
        .singular-shop #reviews #comments ol.commentlist .comment_container img.avatar{position:absolute;left:0;top:4px;width:55px;height:55px;
            border-radius:50%;padding:0;border:0;background:#f0f0f0}
        .singular-shop #reviews #comments .comment-text{display:flex;flex-direction:column}
        @media (max-width:767px){
            .singular-shop #reviews #comments ol.commentlist .comment_container{padding-left:0}
            .singular-shop #reviews #comments ol.commentlist .comment_container img.avatar{display:none}
        }
        .singular-shop #reviews #comments .comment-text .star-rating{margin:0 0 6px;font-size:13px}
        .singular-shop #reviews #comments .comment-text p.meta{display:flex;flex-wrap:wrap;align-items:center;gap:0 8px;font-size:14px;margin:4px 0 8px;line-height:1.6}
        .singular-shop #reviews #comments .comment-text p.meta strong.woocommerce-review__author{color:#1d1d1d;font-weight:600}
        .singular-shop #reviews #comments .comment-text .woocommerce-review__verified{order:1;color:#21ab0b;font-style:normal;font-size:13px}
        .singular-shop #reviews #comments .comment-text .woocommerce-review__dash{display:none}
        .singular-shop #reviews #comments .comment-text .woocommerce-review__published-date{display:none}
        .singular-shop #reviews #comments .comment-text .description{color:#777}
        .singular-shop #reviews #comments .comment-text .description p{margin:0;line-height:1.6;color:#777}

        .singular-shop #reviews #review_form_wrapper{margin-top:34px}
        .singular-shop #reviews .comment-reply-title{font-size:20px;font-weight:600;margin:0 0 16px;color:#000}
        .singular-shop #reviews .comment-form{display:block;max-width:520px}
        .singular-shop #reviews .comment-form p{margin:0 0 16px}
        .singular-shop #reviews .comment-form label{display:block;font-weight:600;font-size:13px;margin-bottom:6px;color:#444}
        .singular-shop #reviews .comment-form input[type=text],
        .singular-shop #reviews .comment-form select,
        .singular-shop #reviews .comment-form textarea{width:100%;border:1px solid #d9d9d9;border-radius:4px;padding:11px 12px;font:inherit;background:#fff}
        .singular-shop #reviews .comment-form textarea{min-height:120px;resize:vertical}
        .singular-shop #reviews .comment-form .form-submit .button{height:44px;line-height:44px;padding:0 28px}
        .singular-shop .related.products{margin-top:44px;clear:both}
        .singular-shop .related.products .title-normal{font-size:20px;font-weight:600;margin:0 0 22px}

        /* Réseaux sociaux (fiche produit) — icônes SVG inline, couleurs de marque (comme le site officiel) */
        .zota-social-links{display:flex;gap:8px;margin-top:16px}
        .zota-social-links a{width:40px;height:40px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;
            color:#fff !important;background:#1b4e9b;transition:opacity .2s;text-decoration:none}
        .zota-social-links a:hover{opacity:.85}
        .zota-social-links a.share-twitter{background:#1c9deb}
        .zota-social-links a.share-linkedin{background:#026fac}
        .zota-social-links a.share-whatsapp{background:#25d366}
        .zota-social-links a.share-email{background:#d44f42}
        .zota-social-links a svg{width:18px;height:18px;fill:currentColor;display:block}

        /* En grille (produits liés / boutique) la description courte reste masquée */
        .display-products.products-grid .woocommerce-product-details__short-description{display:none !important}
        .display-products.products-grid .rating{margin:2px 0}

        /* Lightbox image produit */
        .tr-lb{position:fixed;inset:0;z-index:100060;background:rgba(0,0,0,.88);display:flex;align-items:center;justify-content:center}
        .tr-lb[hidden]{display:none}
        .tr-lb img{max-width:88vw;max-height:88vh;object-fit:contain}
        .tr-lb-close{position:absolute;top:18px;right:24px;background:none;border:0;color:#fff;font-size:34px;line-height:1;cursor:pointer}
        .tr-lb-nav{position:absolute;top:50%;transform:translateY(-50%);background:rgba(255,255,255,.12);border:0;color:#fff;
            width:48px;height:64px;font-size:30px;cursor:pointer}
        .tr-lb-nav.prev{left:16px}
        .tr-lb-nav.next{right:16px}
        .tr-lb-nav:hover{background:rgba(255,255,255,.25)}

        @media (max-width:900px){
            .singular-shop .tr-pdp{gap:28px}
            .tr-pdp .tr-pdp-gallery,.tr-pdp .summary{flex-basis:100%;max-width:100%}
        }

        /* ===== Pages légales / de contenu (Aviso legal, Envío, Privacidad, Términos, Devoluciones) ===== */
        .legal-content{max-width:900px;margin:0 auto;padding:8px 0 20px;color:#4a4a4a;font-size:15px;line-height:1.75}
        .legal-content > .elementor{--e-con-inner-width:100%}
        .legal-content .e-con,.legal-content .e-con-inner,.legal-content .elementor-widget-container{max-width:100% !important;padding:0 !important;margin:0 !important}
        .legal-content h1,.legal-content h2,.legal-content h3,
        .legal-content .elementor-heading-title{color:#1d1d1d;font-weight:600;line-height:1.3;margin:32px 0 12px}
        .legal-content h1:empty{display:none}
        .legal-content h1,.legal-content .elementor-heading-title{font-size:24px}
        .legal-content h2{font-size:20px}
        .legal-content h3{font-size:17px}
        .legal-content > *:first-child{margin-top:0}
        .legal-content p{margin:0 0 16px}
        .legal-content ul,.legal-content ol{margin:0 0 16px;padding-left:22px}
        .legal-content ul li{list-style:disc;margin:0 0 8px}
        .legal-content ol li{list-style:decimal;margin:0 0 8px}
        .legal-content a{color:var(--tb-theme-color,#24c200);text-decoration:underline}
        .legal-content strong{color:#1d1d1d}
        .legal-content hr{border:0;border-top:1px solid #e6e6e6;margin:22px 0}

        /* ===== Lista de deseos (favoritos) ===== */
        .woocommerce-wishlist .wishlist_table{width:100%;border-collapse:collapse;margin:8px 0 30px}
        .woocommerce-wishlist .wishlist_table th,
        .woocommerce-wishlist .wishlist_table td{border-bottom:1px solid #ececec;padding:16px 14px;text-align:left;vertical-align:middle;font-size:14px}
        .woocommerce-wishlist .wishlist_table thead th{border-bottom:2px solid #e2e2e2;font-weight:600;color:#1d1d1d;font-size:13px;text-transform:uppercase;letter-spacing:.02em}
        .woocommerce-wishlist .wishlist_table .product-thumbnail{width:90px}
        .woocommerce-wishlist .wishlist_table .product-thumbnail img{width:72px;height:72px;object-fit:contain;border:1px solid #eee;background:#fafafa}
        .woocommerce-wishlist .wishlist_table .product-remove{width:40px}
        .woocommerce-wishlist .wishlist_table .product-remove .remove{display:inline-flex;align-items:center;justify-content:center;
            width:24px;height:24px;border-radius:50%;border:1px solid #d9d9d9;color:#999;font-size:16px;line-height:1;text-decoration:none}
        .woocommerce-wishlist .wishlist_table .product-remove .remove:hover{border-color:#c62828;color:#c62828}
        .woocommerce-wishlist .wishlist_table .product-name a{color:#1d1d1d;font-weight:500}
        .woocommerce-wishlist .wishlist_table .product-name a:hover{color:var(--tb-theme-color,#24c200)}
        .woocommerce-wishlist .wishlist_table .product-price ins{text-decoration:none;font-weight:600;color:var(--tb-theme-color,#24c200)}
        .woocommerce-wishlist .wishlist_table .product-price del{opacity:.5;margin-left:8px;font-size:.9em}
        .woocommerce-wishlist .wishlist_table .in-stock{color:#2e7d32;font-weight:600}
        .woocommerce-wishlist .wishlist_table .out-of-stock{color:#c62828;font-weight:600}
        .woocommerce-wishlist .wishlist_table .product-add-to-cart .button{display:inline-block;background:var(--tb-theme-color,#24c200);color:#fff;
            border:0;border-radius:4px;padding:0 18px;height:40px;line-height:40px;font-size:13px;white-space:nowrap}
        .woocommerce-wishlist .wishlist_table .product-add-to-cart .button:hover{background:var(--tb-theme-color-hover,#22b800)}
        .woocommerce-wishlist .wishlist_table .product-add-to-cart .button.disabled,
        .woocommerce-wishlist .wishlist_table .product-add-to-cart .button.added{background:#bdbdbd;pointer-events:none}
        .woocommerce-wishlist .wishlist-empty{text-align:center;color:#888;padding:44px 0 !important;border:0 !important}
        @media (max-width:640px){
            .woocommerce-wishlist .wishlist_table thead{display:none}
            .woocommerce-wishlist .wishlist_table tr{display:flex;flex-wrap:wrap;align-items:center;gap:8px 14px;border-bottom:1px solid #ececec;padding:12px 0}
            .woocommerce-wishlist .wishlist_table td{border:0;padding:2px 0}
            .woocommerce-wishlist .wishlist_table .product-add-to-cart{flex:1 1 100%}
            .woocommerce-wishlist .wishlist_table .product-add-to-cart .button{width:100%;text-align:center}
        }

        /* ===== Logo Remolques Titos =====
           - En-tête / menu (fond vert foncé) : logo-blanc.png
           - Pied de page : logo.png (couleur) */
        .header-logo-img,.mobile-logo a img,.checkout-logo img,.footer-logo-img{width:auto !important;height:56px !important;max-height:62px;object-fit:contain}
        .topbar-device-mobile .mobile-logo a img,.mobile-logo a img{height:42px !important}
        .footer-logo-img{height:64px !important;max-height:72px}
        @media (max-width:1199px){.header-logo-img{height:46px !important}.footer-logo-img{height:54px !important}}

        /* ===== Datos legales de la empresa (pie de página, todas las páginas) ===== */
        .company-legal-info{background:#0b3d1e;color:#e8f3ea;padding:18px 0;font-size:12px;line-height:1.7;text-align:center}
        .company-legal-info .container{max-width:1200px;margin:0 auto;padding:0 15px}
        .company-legal-info p{margin:0 0 4px}
        .company-legal-info p:last-child{margin-bottom:0}
        .company-legal-info strong{color:#fff}
        @media (max-width:600px){.company-legal-info{font-size:11px}}
        .company-legal-info a{color:#bfe6c8;text-decoration:underline}

        /* ===== Teléfono dans l'en-tête ===== */
        .header-phone{display:flex;justify-content:flex-end;align-items:center}
        .header-phone .elementor-widget-container{text-align:right}
        .header-phone a{color:#fff;font-weight:700;font-size:13px;white-space:nowrap;letter-spacing:.3px}
        .header-phone a:hover{color:#bfe6c8}
        .header-phone i{vertical-align:middle}
        .footer-phone a{color:#0d8dfd}

        /* ===== Productos vistos recientemente ===== */
        .product-recently-viewed-header .header-title{font-size:14px;font-weight:700;margin:0 0 10px}
        .product-recently-viewed-header .content-view.empty .list-recent{font-size:12px;color:#888}
        .product-recently-viewed-header .list-recent{display:flex;flex-direction:column;gap:10px;max-height:340px;overflow-y:auto}
        .product-recently-viewed-header .rv-item{display:flex;gap:10px;align-items:center;text-decoration:none;color:inherit}
        .product-recently-viewed-header .rv-thumb{flex:0 0 48px;width:48px;height:48px;border:1px solid #e2e2e2;background:#fff;border-radius:4px;overflow:hidden;display:flex;align-items:center;justify-content:center}
        .product-recently-viewed-header .rv-thumb img{width:100%;height:100%;object-fit:contain}
        .product-recently-viewed-header .rv-info{display:flex;flex-direction:column;min-width:0}
        .product-recently-viewed-header .rv-name{font-size:12px;line-height:1.35;font-weight:600;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
        .product-recently-viewed-header .rv-price{font-size:12px;color:var(--tb-theme-color,#24c200);font-weight:700}
        .product-recently-viewed-header .rv-price del{color:#999;font-weight:400;margin-left:4px}
        .product-recently-viewed-header .rv-item:hover .rv-name{color:var(--tb-theme-color,#24c200)}

        /* ===== Bouton flottant WhatsApp ===== */
        .tr-wa{position:fixed;right:20px;bottom:20px;z-index:99999;display:flex;align-items:center;justify-content:center;
            width:56px;height:56px;border-radius:50%;background:#25d366;color:#fff;box-shadow:0 6px 20px rgba(0,0,0,.25);
            transition:transform .2s,box-shadow .2s;text-decoration:none}
        .tr-wa:hover{transform:scale(1.06);box-shadow:0 10px 28px rgba(0,0,0,.32);color:#fff}
        .tr-wa svg{width:30px;height:30px;fill:currentColor}
        .tr-wa .tr-wa-pulse{position:absolute;inset:0;border-radius:50%;background:#25d366;opacity:.55;animation:tr-wa-pulse 2s infinite}
        @keyframes tr-wa-pulse{0%{transform:scale(1);opacity:.55}70%{transform:scale(1.8);opacity:0}100%{opacity:0}}
        @media (max-width:600px){.tr-wa{right:14px;bottom:14px;width:50px;height:50px}.tr-wa svg{width:26px;height:26px}}
        /* Le bouton "retour en haut" se place AU-DESSUS du bouton WhatsApp (plus de chevauchement) */
        .tbay-to-top,.tbay-to-top.active{right:20px;bottom:92px}
        .tbay-to-top-mobile,.tbay-to-top-mobile.active{right:14px;bottom:78px}
        @media (max-width:600px){.tbay-to-top,.tbay-to-top.active{right:14px;bottom:78px}}

        /* ===== Corrections responsive ===== */
        /* Barre de navigation mobile fixe en bas : on remonte le bouton WhatsApp
           et le "retour en haut" pour ne plus recouvrir "Mi cuenta". */
        @media (max-width:1199px){
            .tr-wa{bottom:88px}
            .tbay-to-top,.tbay-to-top.active,.tbay-to-top-mobile,.tbay-to-top-mobile.active{bottom:152px}
        }
        @media (max-width:600px){
            .tr-wa{right:12px;bottom:84px}
            .tbay-to-top,.tbay-to-top.active,.tbay-to-top-mobile,.tbay-to-top-mobile.active{bottom:146px}
        }

        /* Bande "Envío rápido / Pago seguro / Posible descuento / Asistencia 24/7"
           + colonnes de liens du pied de page : empilage sur mobile. */
        @media (max-width:991px){
            .tbay-footer .elementor-container{flex-wrap:wrap}
            .tbay-footer .elementor-col-25{width:50% !important;flex:0 0 50% !important}
        }
        @media (max-width:575px){
            .tbay-footer .elementor-col-25{width:100% !important;flex:0 0 100% !important}
            .tbay-footer .elementor-icon-box-wrapper{flex-direction:column;text-align:center;gap:6px}
            .tbay-footer .elementor-icon-box-icon{margin:0 auto}
            .tbay-footer .elementor-icon-box-content,
            .tbay-footer .elementor-icon-box-title,
            .tbay-footer .elementor-icon-box-title > span{text-align:center !important}
        }

        /* ===== Barre de recherche mobile : masquée, ouverte via un bouton loupe ===== */
        .tr-search-toggle{display:none}
        @media (max-width:1199px){
            /* Barre mobile collante (plus d'en-tête fixe -> plus d'espace vide en haut) */
            .topbar-device-mobile{position:sticky !important;top:0}
            #wrapper-container.wrapper-container,
            body .wrapper-container,
            body.tbay-search-mb .wrapper-container{padding-top:0 !important}

            /* La zone de recherche devient un simple bouton en ligne (près du panier) */
            .topbar-device-mobile > div.search-device{
                flex:0 0 auto !important;width:auto !important;display:flex !important;
                align-items:center;justify-content:flex-end;padding-bottom:0 !important}
            .tr-search-toggle{display:inline-flex;align-items:center;justify-content:center;
                width:42px;height:42px;color:inherit}
            .tr-search-toggle i{font-size:20px}
            .topbar-device-mobile > div.search-device .tbay-search-form.tbay-search-mobile{
                display:none;position:absolute;top:100%;left:0;right:0;z-index:60;width:auto;
                background:#fff;padding:10px;border-top:1px solid #e5e5e5;box-shadow:0 10px 18px rgba(0,0,0,.18)}
            /* .is-open doit battre la règle display:none ci-dessus (même spécificité de base) */
            .topbar-device-mobile > div.search-device.is-open .tbay-search-form.tbay-search-mobile{display:block !important}
            .search-device.is-open .tr-search-toggle{opacity:.55}
        }
        </style>
        <link rel='stylesheet' id='elementor-post-3493-css' href='/wp-content/uploads/elementor/css/post-34931e61.css'
            media='all' />
        <link rel='stylesheet' id='elementor-post-1005-css' href='/wp-content/uploads/elementor/css/post-10052532.css'
            media='all' />
        <link rel='stylesheet' id='font-awesome-css'
            href='/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min1849.css?ver=4.7.0'
            media='all' />
        <style id="font-awesome-inline-css">
            [data-font="FontAwesome"]:before {
                font-family: 'FontAwesome' !important;
                content: attr(data-icon) !important;
                speak: none !important;
                font-weight: normal !important;
                font-variant: normal !important;
                text-transform: none !important;
                line-height: 1 !important;
                font-style: normal !important;
                -webkit-font-smoothing: antialiased !important;
                -moz-osx-font-smoothing: grayscale !important;
            }

            /*# sourceURL=font-awesome-inline-css */
        </style>
        <link rel='stylesheet' id='zota-font-tbay-custom-css'
            href='/wp-content/themes/zota/css/font-tbay-custom8a54.css?ver=1.0.0' media='all' />
        <link rel='stylesheet' id='simple-line-icons-css'
            href='/wp-content/themes/zota/css/simple-line-icons8d5a.css?ver=2.4.0' media='all' />
        <link rel='stylesheet' id='material-design-iconic-font-css'
            href='/wp-content/themes/zota/css/material-design-iconic-font3601.css?ver=2.2.0' media='all' />
        <link rel='stylesheet' id='animate-css' href='/wp-content/themes/zota/css/animate3b71.css?ver=3.5.0'
            media='all' />
        <link rel='stylesheet' id='jquery-treeview-css'
            href='/wp-content/themes/zota/css/jquery.treeview8a54.css?ver=1.0.0' media='all' />
        <link rel='stylesheet' id='magnific-popup-css'
            href='/wp-content/themes/zota/css/magnific-popup8a54.css?ver=1.0.0' media='all' />
        <link rel='stylesheet' id='elementor-gf-local-roboto-css'
            href='/wp-content/uploads/elementor/google-fonts/css/robotoefb6.css?ver=1744920321' media='all' />
        <link rel='stylesheet' id='elementor-gf-local-robotoslab-css'
            href='/wp-content/uploads/elementor/google-fonts/css/robotoslab1101.css?ver=1744920324' media='all' />
        <script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
        <script type="text/template" id="tmpl-unavailable-variation-template">
	<p role="alert">Lo siento, este producto no está disponible. Por favor, elige otra combinación.</p>
</script>
        <script id="jquery-core-js-extra">
            var xlwcty = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "version": "1.17.1",
                "wc_version": "11.0.1",
                "l": "Valid"
            };
            //# sourceURL=jquery-core-js-extra
        </script>
        <script id="jquery-core-js" src="/wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1"></script>
        <script id="jquery-migrate-js" src="/wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1"></script>
        <script id="easy-autocomplete-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/easy-autocomplete/jquery.easy-autocomplete.min8b46.js?ver=3.3.4.5">
        </script>
        <script id="woof-husky-js-extra">
            var woof_husky_txt = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "plugin_uri": "/wp-content/plugins/woocommerce-products-filter/ext/by_text/",
                "loader": "/wp-content/plugins/woocommerce-products-filter/ext/by_text/assets/img/ajax-loader.gif",
                "not_found": "Nothing found!",
                "prev": "Prev",
                "next": "Siguiente",
                "site_link": "",
                "default_data": {
                    "placeholder": "",
                    "behavior": "title_or_content_or_excerpt",
                    "search_by_full_word": "0",
                    "autocomplete": 1,
                    "how_to_open_links": "0",
                    "taxonomy_compatibility": "0",
                    "sku_compatibility": "1",
                    "custom_fields": "",
                    "search_desc_variant": "0",
                    "view_text_length": "10",
                    "min_symbols": "3",
                    "max_posts": "10",
                    "image": "",
                    "notes_for_customer": "",
                    "template": "",
                    "max_open_height": "300",
                    "page": 0
                }
            };
            //# sourceURL=woof-husky-js-extra
        </script>
        <script id="woof-husky-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_text/assets/js/husky8b46.js?ver=3.3.4.5"></script>
        <script data-wp-strategy="defer" id="wc-jquery-blockui-js"
            src="/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.mine7c9.js?ver=2.7.0-wc.11.0.1">
        </script>
        <script id="wc-add-to-cart-js-extra">
            var wc_add_to_cart_params = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
                "i18n_view_cart": "Ver carrito",
                "cart_url": "/carrito",
                "is_cart": "",
                "cart_redirect_after_add": "no"
            };
            //# sourceURL=wc-add-to-cart-js-extra
        </script>
        <script data-wp-strategy="defer" defer id="wc-add-to-cart-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min5ae7.js?ver=11.0.1"></script>
        <script data-wp-strategy="defer" id="wc-js-cookie-js"
            src="/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6f96.js?ver=2.1.4-wc.11.0.1"></script>
        <script id="underscore-js" src="/wp-includes/js/underscore.min55e2.js?ver=1.13.8"></script>
        <script id="wp-util-js-extra">
            var _wpUtilSettings = {
                "ajax": {
                    "url": "/wp-admin/admin-ajax.php"
                }
            };
            //# sourceURL=wp-util-js-extra
        </script>
        <script id="wp-util-js" src="/wp-includes/js/wp-util.mincf35.js?ver=62f04fbd8d53f7e0c9a479a401b9be99"></script>





        <script id="font-awesome-4-shim-js"
            src="/wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min9c92.js?ver=4.2.3"></script>
        <script id="wc-add-to-cart-variation-js-extra">
            var wc_add_to_cart_variation_params = {
                "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
                "i18n_no_matching_variations_text": "Lo siento, no hay productos que igualen tu selecci\u00f3n. Por favor, escoge una combinaci\u00f3n diferente.",
                "i18n_make_a_selection_text": "Elige las opciones del producto antes de a\u00f1adir este producto a tu carrito.",
                "i18n_unavailable_text": "Lo siento, este producto no est\u00e1 disponible. Por favor, elige otra combinaci\u00f3n.",
                "i18n_reset_alert_text": "Se ha restablecido tu selecci\u00f3n. Por favor, elige alguna opci\u00f3n del producto antes de poder a\u00f1adir este producto a tu carrito."
            };
            //# sourceURL=wc-add-to-cart-variation-js-extra
        </script>
        <script data-wp-strategy="defer" defer id="wc-add-to-cart-variation-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min5ae7.js?ver=11.0.1"></script>
        <script id="wc-single-product-js-extra">
            var wc_single_product_params = {
                "i18n_required_rating_text": "Por favor elige una puntuaci\u00f3n",
                "i18n_rating_options": ["1 de 5 estrellas", "2 de 5 estrellas", "3 de 5 estrellas", "4 de 5 estrellas",
                    "5 de 5 estrellas"
                ],
                "i18n_product_gallery_trigger_text": "Ver galer\u00eda de im\u00e1genes a pantalla completa",
                "review_rating_required": "yes",
                "flexslider": {
                    "rtl": false,
                    "animation": "slide",
                    "smoothHeight": true,
                    "directionNav": false,
                    "controlNav": "thumbnails",
                    "slideshow": false,
                    "animationSpeed": 500,
                    "animationLoop": false,
                    "allowOneSlide": false
                },
                "zoom_enabled": "",
                "zoom_options": [],
                "photoswipe_enabled": "1",
                "photoswipe_options": {
                    "shareEl": false,
                    "closeOnScroll": false,
                    "history": false,
                    "hideAnimationDuration": 0,
                    "showAnimationDuration": 0
                },
                "flexslider_enabled": "1"
            };
            //# sourceURL=wc-single-product-js-extra
        </script>
        <script data-wp-strategy="defer" defer id="wc-single-product-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/single-product.min5ae7.js?ver=11.0.1"></script>
        <noscript>
            <style>
                .woocommerce-product-gallery {
                    opacity: 1 !important;
                }
            </style>
        </noscript>

        <style>
            .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }

            @media screen and (max-height: 1024px) {

                .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
                .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                    background-image: none !important;
                }
            }

            @media screen and (max-height: 640px) {

                .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
                .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                    background-image: none !important;
                }
            }
        </style>

        <link rel="icon" href="/favicon.ico" sizes="any" />
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />
        <meta name="msapplication-TileImage" content="/assets/img/icon-192.png" />
        <meta name="theme-color" content="#ffffff" />
        <script>
            function setREVStartSize(e) {
                //window.requestAnimationFrame(function() {
                window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
                window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
                try {
                    var pw = document.getElementById(e.c).parentNode.offsetWidth,
                        newh;
                    pw = pw === 0 || isNaN(pw) || (e.l == "fullwidth" || e.layout == "fullwidth") ? window.RSIW : pw;
                    e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                    e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                    e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                    e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                    e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                    e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                    e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                    if (e.layout === "fullscreen" || e.l === "fullscreen")
                        newh = Math.max(e.mh, window.RSIH);
                    else {
                        e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                        for (var i in e.rl)
                            if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                        e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                        e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                        for (var i in e.rl)
                            if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                        var nl = new Array(e.rl.length),
                            ix = 0,
                            sl;
                        e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                        e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                        e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                        e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                        for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                        sl = nl[0];
                        for (var i in nl)
                            if (sl > nl[i] && nl[i] > 0) {
                                sl = nl[i];
                                ix = i;
                            }
                        var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                        newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
                    }
                    var el = document.getElementById(e.c);
                    if (el !== null && el) el.style.height = newh + "px";
                    el = document.getElementById(e.c + "_wrapper");
                    if (el !== null && el) {
                        el.style.height = newh + "px";
                        el.style.display = "block";
                    }
                } catch (e) {
                    console.log("Failure at Presize of Slider:" + e)
                }
                //});
            };
        </script>
        <style id="wp-custom-css">
            /* Changer la couleur de fond, du texte en blanc et mettre le texte en gras */
            .woocommerce-store-notice.demo_store {
                background-color: #54c706;
                /* Vert clair */
                color: #FFFFFF;
                /* Texte en blanc */
                font-weight: bold;
                /* Texte en gras */
            }

            /* Changer la couleur du lien "Descartar" (fermer la notification) */
            .woocommerce-store-notice.demo_store a.woocommerce-store-notice__dismiss-link {
                color: #fff;
                /* Lien en vert foncé */
            }

            /* Changer la couleur du texte au survol du lien */
            .woocommerce-store-notice.demo_store a.woocommerce-store-notice__dismiss-link:hover {
                color: #000;
                /* Lien vert clair au survol */
            }

            .woocommerce-info.custom-bank-notice {
                background-color: #ffeb3b;
                color: #000000;
                font-weight: bold;
                padding: 1em;
                border-radius: 0.25em;
                display: flex;
                align-items: center;
            }

            .custom-bank-notice-icon {
                margin-right: 0.5em;
                font-size: 1.2em;
                line-height: 1;
            }
        </style>

    @endverbatim
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/lv.css?v={{ @filemtime(public_path('assets/css/lv.css')) ?: date('Ymd') }}">
    @verbatim
    </head>

    @endverbatim
    <body data-rsssl=1
        class="wp-theme-zota theme-zota woocommerce-no-js eio-default woo-variation-swatches wvs-behavior-blur wvs-theme-zota wvs-show-label wvs-tooltip skin-electronics tbay-show-cart-mobile tbay-body-mobile-product-two tbay-hide-variation-selector tbay-show-quantity-mobile elementor-default elementor-kit-6 tbay-variation-free ajax_cart_popup @yield('body_class', 'home wp-singular page-template-default page page-id-384 tbay-homepage-demo inicio tbay-home elementor-page elementor-page-384 woocommerce woocommerce-page')">
    @verbatim
        <div id="wrapper-container" class="wrapper-container">


            <div id="tbay-mobile-smartmenu" data-title="Menu" class="tbay-mmenu d-xl-none">


                <div class="tbay-offcanvas-body">

                    <div id="mmenu-close">
                        <button type="button" class="btn btn-toggle-canvas" data-toggle="offcanvas">
                            <i class="tb-icon tb-icon-close-01"></i>
                        </button>
                    </div>

                    <nav id="tbay-mobile-menu-navbar" class="menu navbar navbar-offcanvas navbar-static"
                        data-id="main-menu">
                        <div id="main-mobile-menu-mmenu" class="menu-main-menu-container">
                            <ul id="main-mobile-menu-mmenu-wrapper" class="menu">
                                <li id="menu-item-422"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-384 current_page_item  active ">
                                    <a class="elementor-item" href="/">Inicio</a></li>
                                <li id="menu-item-5862" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a class="elementor-item" href="/tienda">Tienda</a></li>
                                <li id="menu-item-5859" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a class="elementor-item" href="/contacto">Contacto</a></li>
                                <li id="menu-item-5861" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a class="elementor-item" href="/seguimiento-de-pedidos">Seguimiento de pedidos</a>
                                </li>
                            </ul>
                        </div>
                    </nav>


                </div>
                <div id="mm-tbay-bottom">

                    <div class="mm-bottom-track-wrapper">

                        <div class="mm-bottom-langue-currency ">
                            <div class="mm-bottom-langue">
                            </div>


                        </div>
                    </div>


                </div>

            </div>
            <div class="topbar-device-mobile d-xl-none clearfix ">

                <div class="active-mobile"><a href="javascript:void(0);" class="btn btn-sm mmenu-open"><i
                            class="tb-icon tb-icon-menu"></i></a><a href="#page" class="btn btn-sm"><i
                            class="tb-icon tb-icon-cross"></i></a></div>
                <div class="topbar-icon-home"><a href="/"><i class="tb-icon tb-icon-home3"></i></a></div>
                <div class="mobile-logo"><a href="/"><img src="/assets/img/logo.png" width="567" height="440" alt="Remolques Titos"></a></div>
                <div class="device-mini_cart top-cart tbay-element-mini-cart">
                    <div class="tbay-dropdown-cart sidebar-right">
                        <div class="dropdown-content">
                            <div class="widget-header-cart">
                                <h3 class="widget-title heading-title">Cesta de la compra</h3>
                                <a href="javascript:;" class="offcanvas-close"><i class="tb-icon tb-icon-cross"></i></a>
                            </div>
                            <div class="widget_shopping_cart_content">
                                @endverbatim
                                @include('partials.mini-cart')
                                @verbatim
                            </div>
                        </div>
                    </div>
                    <div class="tbay-topcart">
                        <div id="cart-wfXIV" class="cart-dropdown dropdown">
                            <a class="dropdown-toggle mini-cart v2" data-offcanvas="offcanvas-right"
                                data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true"
                                data-delay="0" href="#">
                                <i class="tb-icon tb-icon-shopping-cart"></i>

                                <span class="mini-cart-items">
                                    0 </span>
                                <span>Cart</span>
                            </a>
                            <div class="dropdown-menu"></div>
                        </div>
                    </div>
                </div>
                <div class="search-device">

                    <a href="#" class="tr-search-toggle" role="button" aria-label="Buscar" aria-expanded="false">
                        <i aria-hidden="true" class="tb-icon tb-icon-search"></i>
                    </a>

                    <div class="tbay-search-form tbay-search-mobile">
                        <form action="/tienda" method="get" data-parents=".topbar-device-mobile"
                            class="searchform zota-ajax-search" data-appendto=".search-results-2AWek" data-thumbnail="1"
                            data-price="1" data-minChars="2" data-post-type="product" data-count="5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="button-group input-group-addon">
                                        <button type="submit" class="button-search btn btn-sm>">
                                            <i aria-hidden="true" class="tb-icon tb-icon-search"></i>
                                        </button>
                                        <div class="tbay-preloader"></div>
                                    </div>
                                    <input data-style="right" type="text" placeholder="Buscar en productos..."
                                        name="s" required
                                        oninvalid="this.setCustomValidity('Enter at least 2 characters')"
                                        oninput="setCustomValidity('')" class="tbay-search form-control input-sm" />



                                    <div class="search-results-wrapper">
                                        <div class="zota-search-results search-results-2AWek" data-ajaxsearch="1"
                                            data-price="1"></div>
                                    </div>
                                    <input type="hidden" name="post_type" value="product" class="post_type" />
                                </div>

                            </div>
                        </form>
                        <div id="search-mobile-nav-cover"></div>

                    </div>
                </div>
            </div>
            <div class="footer-device-mobile d-xl-none clearfix">

                <div class="list-menu-icon">
                    <div class="menu-icon"><a title="Inicio" class="home active" href="/"><span
                                class="menu-icon-child"><i
                                    class="tb-icon tb-icon-home3"></i><span>Inicio</span></span></a></div>
                    <div class="menu-icon"><a title="Tienda" class="shop" href="/tienda"><span
                                class="menu-icon-child"><i
                                    class="tb-icon tb-icon-store"></i><span>Tienda</span></span></a></div>
                    <div class="menu-icon"><a title="Mi cesta" class="cart" href="/carrito"><span class="menu-icon-child"><i class="tb-icon tb-icon-cart"></i><span class="mini-cart-items">0</span><span>Mi cesta</span></span></a></div>
                    <div class="menu-icon"><a title="Mi cuenta" class="account" href="/mi-cuenta"><span
                                class="menu-icon-child"><i class="tb-icon tb-icon-user"></i><span>Mi cuenta</span></span></a></div>
                </div>
            </div>

            <header id="tbay-header" class="tbay_header-template site-header ">



                <div data-elementor-type="wp-post" data-elementor-id="3493" class="elementor elementor-3493">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-17c1befb elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="17c1befb" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6494aa2"
                                data-id="6494aa2" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-5185e064 elementor-nav-menu__align-flex-start elementor-widget elementor-widget-tbay-nav-menu"
                                        data-id="5185e064" data-element_type="widget" data-e-type="widget"
                                        data-settings="{&quot;layout&quot;:&quot;horizontal&quot;}"
                                        data-widget_type="tbay-nav-menu.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-nav-menu"
                                                data-wrapper="{&quot;layout&quot;:&quot;horizontal&quot;,&quot;type_menu&quot;:null}">


                                                <nav class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal tbay-horizontal tbay-horizontal"
                                                    data-id="main-menu">
                                                    <ul id="menu-main-menu"
                                                        class="elementor-nav-menu menu nav navbar-nav megamenu flex-row">
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-384 current_page_item active menu-item-422 level-0  active  aligned-">
                                                            <a class="elementor-item" href="/">Inicio</a></li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5862 level-0 aligned-">
                                                            <a class="elementor-item" href="/tienda">Tienda</a></li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5859 level-0 aligned-left">
                                                            <a class="elementor-item" href="/contacto">Contacto</a></li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5861 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/seguimiento-de-pedidos">Seguimiento de pedidos</a>
                                                        </li>
                                                    </ul>
                                                </nav>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4655f818"
                                data-id="4655f818" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-widget elementor-widget-text-editor header-phone">
                                        <div class="elementor-widget-container">
                                            <a href="tel:+34683573516"><i class="tb-icon tb-icon-phone"></i>&nbsp;+34 683 57 35 16</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-56964b3b elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="56964b3b" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-1f90657"
                                data-id="1f90657" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-4f5396fd w-auto elementor-widget elementor-widget-zota-site-logo elementor-widget-tbay-base"
                                        data-id="4f5396fd" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="zota-site-logo.default">
                                        <div class="elementor-widget-container">

                                            <div class="tbay-element tbay-element-site-logo">

                                                <div class="header-logo">

                                                    <a href="/">
                                                        <img width="567" height="440" src="/assets/img/logo-blanc.png"
                                                            class="header-logo-img" alt="Remolques Titos" decoding="async" />
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3bca58ce"
                                data-id="3bca58ce" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-73c510ca elementor-widget elementor-widget-tbay-search-form"
                                        data-id="73c510ca" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-search-form.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-search-form">
                                                <div class="tbay-search-form">
                                                    <form action="/tienda" method="get"
                                                        class="zota-ajax-search searchform" data-thumbnail="1"
                                                        data-appendto=".search-results-5VRGX" data-price="1"
                                                        data-minChars="2" data-post-type="product" data-count="5">
                                                        <div class="form-group">
                                                            <div class="input-group">


                                                                <div class="select-category input-group-addon">

                                                                    <select name='product_cat' id='product-cat-5VRGX'
                                                                        class='dropdown_product_cat'>
                                                                        <option value='' selected='selected'>Todos
                                                                        </option>
                                                                        <option class="level-0" value="accesorio">
                                                                            Accesorio&nbsp;&nbsp;(4)</option>
                                                                        <option class="level-0" value="cortacespedes">
                                                                            Cortacéspedes&nbsp;&nbsp;(22)</option>
                                                                        <option class="level-0" value="desbrozadoras">
                                                                            Desbrozadoras&nbsp;&nbsp;(9)</option>
                                                                        <option class="level-0" value="motoazadas">
                                                                            Motoazadas&nbsp;&nbsp;(12)</option>
                                                                        <option class="level-0" value="remolque">
                                                                            Remolque&nbsp;&nbsp;(12)</option>
                                                                        <option class="level-0" value="sopladores">
                                                                            Sopladores&nbsp;&nbsp;(9)</option>
                                                                        <option class="level-0" value="tractores">
                                                                            Tractores&nbsp;&nbsp;(17)</option>
                                                                        <option class="level-0" value="trituradoras">
                                                                            Trituradoras&nbsp;&nbsp;(10)</option>
                                                                    </select>


                                                                </div>

                                                                <input data-style="right" type="text"
                                                                    placeholder="Buscar productos..." name="s"
                                                                    required
                                                                    oninvalid="this.setCustomValidity('Introduzca al menos 2 caracteres')"
                                                                    oninput="setCustomValidity('')"
                                                                    class="tbay-search form-control input-sm" />

                                                                <div class="search-results-wrapper">
                                                                    <div class="zota-search-results search-results-5VRGX">
                                                                    </div>
                                                                </div>

                                                                <div class="button-group input-group-addon">
                                                                    <button type="submit"
                                                                        class="button-search btn btn-sm>">
                                                                        <i aria-hidden="true"
                                                                            class="tb-icon tb-icon-search-01"></i>
                                                                    </button>
                                                                    <div class="tbay-preloader"></div>
                                                                </div>


                                                                <input type="hidden" name="post_type" value="product"
                                                                    class="post_type" />
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-5904576"
                                data-id="5904576" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-331800de w-auto elementor-widget elementor-widget-tbay-product-recently-viewed"
                                        data-id="331800de" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-product-recently-viewed.default">
                                        <div class="elementor-widget-container">

                                            <div class="tbay-element tbay-element-product-recently-viewed product-recently-viewed-header"
                                                data-wrapper="{&quot;layout&quot;:&quot;header&quot;}" data-column="12">



                                                <h3 class="header-title">
                                                    Vistos recientemente </h3>
                                                <div class="content-view empty">
                                                    <div class="list-recent">
                                                        No ha visto ningún artículo recientemente. </div>

                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-24bec150 elementor-widget w-auto elementor-widget-tbay-account"
                                        data-id="24bec150" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-account.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-account header-icon">
                                                <div class="tbay-login">

                                                    <a href="/mi-cuenta" class="account-button">
                                                        <i aria-hidden="true" class="tb-icon tb-icon-account"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-81b0b55 elementor-widget w-auto elementor-widget-tbay-wishlist"
                                        data-id="81b0b55" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-wishlist.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-wishlist top-wishlist header-icon">
                                                <a href="/favoritos" class="wishlist">
                                                    <i aria-hidden="true" class="tb-icon tb-icon-heart"></i> <span
                                                        class="count_wishlist">0</span>





                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-72c46d12 elementor-widget w-auto elementor-widget-tbay-mini-cart"
                                        data-id="72c46d12" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-mini-cart.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-mini-cart">
                                                <div class="tbay-topcart left-right">
                                                    <div id="cart-kSKMR" class="cart-dropdown dropdown">
                                                        <a class="dropdown-toggle mini-cart v2"
                                                            data-offcanvas="offcanvas-right" data-toggle="dropdown"
                                                            aria-expanded="true" role="button" aria-haspopup="true"
                                                            data-delay="0" href="javascript:void(0);"
                                                            title="Ver su cesta de la compra">

                                                            <span class="cart-icon">

                                                                <i class="tb-icon tb-icon-shopping-cart"></i>
                                                                <span class="mini-cart-items">
                                                                    0 </span>
                                                            </span>

                                                            <span class="text-cart">


                                                                <span class="subtotal"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>0.00<span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">&euro;</span></bdi></span></span>

                                                            </span>

                                                        </a>
                                                        <div class="dropdown-menu"></div>
                                                    </div>

                                                    <div class="tbay-dropdown-cart sidebar-right">
                                                        <div class="dropdown-content">
                                                            <div class="widget-header-cart">
                                                                <h3 class="widget-title heading-title">Cesta de la compra
                                                                </h3>
                                                                <a href="javascript:;" class="offcanvas-close"><i
                                                                        class="tb-icon tb-icon-cross"></i></a>
                                                            </div>
                                                            <div class="widget_shopping_cart_content">
                                                                @endverbatim
                                                                @include('partials.mini-cart')
                                                                @verbatim
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-31208c4 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="31208c4" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8798653"
                                data-id="8798653" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-5760c41 elementor-nav-menu__align-center elementor-widget elementor-widget-tbay-nav-menu"
                                        data-id="5760c41" data-element_type="widget" data-e-type="widget"
                                        data-settings="{&quot;layout&quot;:&quot;horizontal&quot;}"
                                        data-widget_type="tbay-nav-menu.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-nav-menu"
                                                data-wrapper="{&quot;layout&quot;:&quot;horizontal&quot;,&quot;type_menu&quot;:null}">


                                                <nav class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal tbay-horizontal tbay-horizontal"
                                                    data-id="menu-de-produit">
                                                    <ul id="menu-menu-de-produit"
                                                        class="elementor-nav-menu menu nav navbar-nav megamenu flex-row">
                                                        <li id="menu-item-5969"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5969 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/tractores">Tractores</a></li>
                                                        <li id="menu-item-5967"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5967 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/motoazadas">Motoazadas</a>
                                                        </li>
                                                        <li id="menu-item-5966"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5966 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/desbrozadoras">Desbrozadoras</a>
                                                        </li>
                                                        <li id="menu-item-5965"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5965 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/cortacespedes">Cortacéspedes</a>
                                                        </li>
                                                        <li id="menu-item-5968"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5968 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/sopladores">Sopladores</a>
                                                        </li>
                                                        <li id="menu-item-5970"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5970 level-0 aligned-left">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/trituradoras">Trituradoras</a>
                                                        </li>
                                                        <li id="menu-item-6395"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-6395 level-0 aligned-">
                                                            <a class="elementor-item"
                                                                href="/categoria-de-producto/remolque">Remolque</a></li>
                                                    </ul>
                                                </nav>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <div id="nav-cover"></div>
                <div class="bg-close-canvas-menu"></div>
            </header>
            <div id="tbay-main-content">
                @endverbatim
                @yield('breadcrumb')
                @verbatim
                <section id="main-container" class="container">
                    <div class="row ">
                        <div id="main-content" class="main-page col-12">
                            <div id="main" class="site-main">
                            @endverbatim

                            @yield('content')

                            @verbatim
                            </div><!-- .site-main -->

                        </div><!-- .content-area -->
                    </div>
                </section>

            </div><!-- .site-content -->

            <footer id="tbay-footer" class="tbay-footer footer footer-mobile-collapse">

                <div data-elementor-type="wp-post" data-elementor-id="1005" class="elementor elementor-1005">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-2cdbc28 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="2cdbc28" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-110a85a"
                                data-id="110a85a" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-ae2e292 elementor-position-inline-start tbay-custom-icon-box elementor-view-stacked elementor-shape-circle elementor-mobile-position-block-start elementor-widget elementor-widget-icon-box"
                                        data-id="ae2e292" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">

                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon">
                                                        <i aria-hidden="true" class="tb-icon tb-icon-freeshipping"></i>
                                                    </span>
                                                </div>

                                                <div class="elementor-icon-box-content">

                                                    <h3 class="elementor-icon-box-title">
                                                        <span>
                                                            Envío rápido </span>
                                                    </h3>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-e51f5cb"
                                data-id="e51f5cb" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-6008285 elementor-position-inline-start tbay-custom-icon-box elementor-view-stacked elementor-shape-circle elementor-mobile-position-block-start elementor-widget elementor-widget-icon-box"
                                        data-id="6008285" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">

                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon">
                                                        <i aria-hidden="true" class="tb-icon tb-icon-quick-payment"></i>
                                                    </span>
                                                </div>

                                                <div class="elementor-icon-box-content">

                                                    <h3 class="elementor-icon-box-title">
                                                        <span>
                                                            Pago seguro </span>
                                                    </h3>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ff4678f"
                                data-id="ff4678f" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-bc5ba84 elementor-position-inline-start tbay-custom-icon-box elementor-view-stacked elementor-shape-circle elementor-mobile-position-block-start elementor-widget elementor-widget-icon-box"
                                        data-id="bc5ba84" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">

                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon">
                                                        <i aria-hidden="true" class="tb-icon tb-icon-gift"></i> </span>
                                                </div>

                                                <div class="elementor-icon-box-content">

                                                    <h3 class="elementor-icon-box-title">
                                                        <span>
                                                            Posible descuento </span>
                                                    </h3>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-deb3393"
                                data-id="deb3393" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-955237e elementor-position-inline-start tbay-custom-icon-box elementor-view-stacked elementor-shape-circle elementor-mobile-position-block-start elementor-widget elementor-widget-icon-box"
                                        data-id="955237e" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">

                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon">
                                                        <i aria-hidden="true" class="tb-icon tb-icon-support"></i> </span>
                                                </div>

                                                <div class="elementor-icon-box-content">

                                                    <h3 class="elementor-icon-box-title">
                                                        <span>
                                                            Asistencia 24/7 </span>
                                                    </h3>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-7b2a99f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="7b2a99f" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-f1918c3"
                                data-id="f1918c3" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-fc6797b elementor-widget elementor-widget-zota-site-logo elementor-widget-tbay-base"
                                        data-id="fc6797b" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="zota-site-logo.default">
                                        <div class="elementor-widget-container">

                                            <div class="tbay-element tbay-element-site-logo">

                                                <div class="header-logo">

                                                    <a href="/">
                                                        <img width="567" height="440"
                                                            src="/assets/img/logo.png"
                                                            class="footer-logo-img" alt="Remolques Titos" decoding="async" />
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-50fbff6 elementor-widget elementor-widget-text-editor"
                                        data-id="50fbff6" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p><!--(figmeta)eyJmaWxlS2V5IjoiMG5BaWRiRGltQmdDdllZd2NoNUM0RyIsInBhc3RlSUQiOi0xLCJkYXRhVHlwZSI6InNjZW5lIn0K(/figmeta)--><!--(figma)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(/figma)-->Dirección:
                                                Avenida Los Emigrantes, s/n<br />18560 Guadahortuna (Granada)<br />Andalucía, España.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-2222a59 elementor-widget elementor-widget-text-editor"
                                        data-id="2222a59" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p>E-mail: <span style="text-decoration: underline; color: #0d8dfd;"><a
                                                        style="color: #0d8dfd;"
                                                        href="mailto:contacto@remolquestitos.com">contacto@remolquestitos.com</a></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-widget elementor-widget-text-editor"
                                        data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p>Teléfono: <span style="text-decoration: underline; color: #0d8dfd;"><a
                                                        style="color: #0d8dfd;"
                                                        href="tel:+34683573516">+34 683 57 35 16</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-2bb1616"
                                data-id="2bb1616" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-d28ec72 elementor-widget elementor-widget-text-editor"
                                        data-id="d28ec72" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p><!--(figmeta)eyJmaWxlS2V5IjoiMG5BaWRiRGltQmdDdllZd2NoNUM0RyIsInBhc3RlSUQiOi0xLCJkYXRhVHlwZSI6InNjZW5lIn0K(/figmeta)--><!--(figma)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(/figma)-->¿Tiene
                                                alguna pregunta? Llámenos 24/7</p>
                                            <p class="footer-phone"><a href="tel:+34683573516">+34 683 57 35 16</a></p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-0e7e847 elementor-widget elementor-widget-text-editor"
                                        data-id="0e7e847" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p><a href="https://wa.me/34683573516?text=Hola,%20me%20gustar%C3%ADa%20recibir%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20remolques."><img
                                                        class="alignnone  wp-image-6518"
                                                        src="/wp-content/uploads/2020/12/Contacta-por-WhatsApp.png"
                                                        alt="" width="185" height="84" /></a></p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-ed62eff elementor-widget elementor-widget-text-editor"
                                        data-id="ed62eff" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p><!--(figmeta)eyJmaWxlS2V5IjoiMG5BaWRiRGltQmdDdllZd2NoNUM0RyIsInBhc3RlSUQiOi0xLCJkYXRhVHlwZSI6InNjZW5lIn0K(/figmeta)--><!--(figma)ZmlnLWtpd2kEAAAAeyEAALV7e5gkyVFfZnX3PHZ2927vTneSEEIIIYQQsLd3ujsJIVRTXT1dO91ddVXVM7uHUKumu2ambnu6m66e2Z1DCCHLMpaFEAIE5iELGYMQthAgwGAQQsbghxBGYMAgYwHCD4wxxi8s6/PH75dZr97Z4+Mf9vu2MzIyMjIyMiIyMrPmrbIbp2l0EIens1iIi1ddpzcIQtMPBf713KY9sNpmb8sOUJX9wPYrdUNR270m4FrgbPXMDqB6EF7v2AAaChgENnmtKFrFeRBsO97AtzuuyZ6rPTd0WtcHQdvtd5qDvrflm032X8vAQdPtsb6e13275dtBG6hzgWX37AHQXnvweN/2rwO5UUX6ttch8nzTabVQXjBvJSlEvwZYsEGawyFUAJRvm82B21PkQlV2fSfkyLI3HcXeYZTGILPQFNqUHERdd0eBcjeZjJLJgX88Jk3P7T1h+y4ahNtU7eSgdXwfGm2gRNO1+l27R+1Iy+ztmAEgY8t3+x6AWss3u6Srb7puxzZ7A9ezfTN03B6QjR3bCl0f0Ap1inK14yi2a3an43gBwXUfRFgstRrnfHur3zH9ged2rm8pJhsYqte0m1BSSXc+tK9RpAtBx7GIuBhc7266XNm7nB4G6yns3UHoWNtU1aWgbXr2YNcJ24Os7z2W2+uBpxLw3uAwmsW7yeIwjG8ttA7Wgsf7pm+jVZTiyqZjdl1lTUboO0ogmAOqtaLadHcpef1Okjc80zc7HdgVlr478J2tNoVZWUZ37Baxq5vjeDLqYlUgoWcGwSBsg+kWrQp273eVLcum6W/bHNHo9juho22pRlVDk5t9n011y+24Ra3R4biqz0oAW1GQWhz0aLrNLRv1Nd0lr67DivyOSd7nArcVDhQP1Dbapt8sasqGbd/WK3DBvmZ1+oG2h4vtPnF3BWbYL4zkbjUKgEudftfpuYETcoh7vCiZZAuxGrgdhxoXUE7TgTViNIoKjCxQLJU+YJ0AiYLSaU3A1QociLL1qztdU82sAQ+56gBYcY4QZYJhNI610hEmfDu0lL5bDqcnW05HDRI6aj1r9v5+PMwErTuwKB9BwoQJoFE0fdcrq7Llwr6xgL3mYLPTp1zGpmltL6NqtEBLufGKC/twdMQSfQ+uhVJ23F0FQIRQyxDAEDoDy/TonPWyNmi5vqVcv0GmzXg4nUeLZDpBn9zBMTKWFeoELDFdZ9sujczoHR/txfP+JFmk6OObnIbwnGt2JwAgIRHCGPViWNNJuphXFg2LCbxguxJXdk3GMwNjZCqtBZapJlBvgWNzoHs0soqiXgkW8+mN2BwnBxN0KJgJeLmjArB0+2EGGprYimYYPp8fpqJWWxbebJi+7+4qE+IkarpqP953OoiZcEMg65mZDLjcmQZz9y5QmXBXpwll6yIMK9E27R2bPGQ+tLE5nY7jaOLO4lz99X5Pmz8mgm4BIgRgGfQ3Q99UsHFNeYWyBjX99nSePDWdLKIxumcBoqJdWIryP+NqH1Gv5SgJy9478XyRwLCJcz00VbpuumHodgEZ3elxGlvH83Q6hwqbdstEQEGDsHw3gB07PmBpX7dp2Fh81AzstGooz8RUEGAsGBDqdU8FlQYKy+kAWtmBn0zn3WQ+J/fCAJVSUUoFwGcRS+zeVkgLMZpReqhd0bAQgoESpf1I5a7a3OpebwsocdWzWcpgh4XhNbmf1uxbs+l8cbuJ1rADIAhir8/sUOSIXaepxpc5om3n6u1Ep9PjxdY8GWkmdW21FXWWAhraiGtlHy9aLOL5BE2gcjxlgIhqKrpJtVjHi6kfp8lTYF2oSImjNFPIIQsIVn86joM4mxQU7gduFjNC2+S6Sgs2oVcYSQlSkJ7FGFsL7a7n+qZKSOo5G2hpERcqOhN6Aco8cGLoaHhDr08hbBtB6wmoTUkgsWdgD1awplbWCPIzatO60kTW9BhCzDPaxtPSFpqumf2QmQxmge5Xj9NFsn+K6tP29EzLHsBRdSZVU90CrXUVf4BE5hQ4T9iD0IXLq3kvIWAkWBSn6yEFQY0toGEcnMDQ4eVag41cL/AO28e6DJiwoi77vtIKdwCUNavjqgyj7nDqUYXFebc3gPUrMmG2wGYQOl0bgQ912XWR8Q7UPA0N64YaerW5ZwOu6wZsQyRr6JrKWlZA5WFeNMQ8Zq41fZPes462bft63u0cqjuuzrc2wnk0SZNSxmcjICPJCQeIXwjN2eYumk4AC9qxAcoW0mKUBnI25Mct3y3ynFoFlcexegWnI1ajgilC1orXD9oalzFbLTE5r7USpVmtl4iC0zmmyRqXcdooMTmn8yVKc7pQIgpOF7WgWAYQ5czuWkLm/O5ewmqWl5ZwBdd71EgZNmN6bxWX87yvitQsn1FFFRzvhxs71oBtqD2AvAHnHrMH71YHimciM3SRSZSYZ9lRivODXvE1HJWs/qZjoUGQdV6RyOIqVYMbrU7C0IPWXjTVSbeEaei+S7gVHb2K+mownE/H42Yy134GPpnh/iWxB5NWcUL3hZMu6GLxCI6/iNFuX/MQX7XfW+DAXVjV5FYfAVAaKc5fGAzwqpDjKbZSBcLfx9jOZH0u1oU8wI+xh59ahJ+63vHQ+RZq8hQ/hg8UqEvETfzUDvFTV5yCxXSGDkPCYkfI2VR7GQiMbrSYJ7eEXDm6fBl1eXT5QRTG0eUrKGpHDxJZP3qQyMbRg0SueNEcsdyZjGL0Mw6Ok5EIK0w38gwPjSfR+DhGH3mssr1nC6MFLfWio1jI2n50lIxPQS9TbhMADDBZpMN5MlugViPtTjRPInQ5PornybCVHBzPoVpsDNlBRcASHLVNS7fTVAdvwGqY5a7BLBrCzpb6esg4XKxntrXJ0NzMcvs7MGhxcTnBKgekdDhSKhh7NCxMrW+1txXNUthX2QUuobJ9iWKQVwzPRuZN0WtADIoaczrLVDG8ARQmuwVwpcLfy/VeFQs5H36R+mHjBqDkCZSSsTgFlQObVtYvkUWqmNuKo4VS8B9KD8k+moR1xVMkmRSG5QXE1ygNSiUgykZ27F8JnB7To1XXb/ZQrpktn+3rzZ6KD+d6/S5F2sDZzkR5HpsQp3ShqcuLbV3ehfMDy7tNU2WLlyxd3uNbqrw30PX7/B11+nwGHRPl/cGuuiB5wAp2WT4Ti0P8syyrS7mfHejN/bPaTkD8c7I99rNdv0f5nkuloPwcbDlcyuc1Q3Us+dxWx+Q8nt/d8rlnfl4AW0P5gm1swCg/v4WECuUL27r8grYe90Whrn/h47p8safLL2JKjfIlndYm61/seqr8Ej9U5Zd6uv9lb7tHPT3YQfhAeQUl5XzIDzusP4yS9Zeam/4OykfMzR3WH0VJuR/b0XxetgOBUL58s7PL9fkylKR7BUrSfbm53eY8XmldVUeFr7BayhFeZXmqblp9n3Sb2H1ZtxDcWDZbmr/dwpkSZQvlFZRbKB9C2cawHM9BSf5X23o+GG2L8nTa7lXaDZIqlQ/1HOztKN2r3qOPofSueo+Rz+NXvZddRulf9S4/jDLoXO2yX9hxLdL3sdFwXXa6dpPH7l2UlONad7tL/PVeR+U6T/T62yHKr0SCQrlejTJA+VU7UDjK13hBSPwAJfGv9bd91iPfa7Pc8/ubXPdhgCQN5SjUcsRhT6XF+1gmrt/BDi4kUB7u6PZkR8/7yZ1tZS83dvzQRzlGeQXlURAg8goxQcn6FOVDKGcoH0b51ShfinKO8hGUKcpHUS5QUk/HKF+G8iQIELOFuImS/G6hJL9TlOT3FEry+xqU5Pc6lOT3tSjJ7/Uoye/rUJLfG2QQXCHDr5fWjpLwjQTI8m8QIM83ESDTv0mAXN9MgGz/FgHy/QYCZPy3CZDzWwAoUf8OAXJ+KwFy/kYC5Pw2AuT8TQTI+e0EyPmbCZDzOwiQ87cQIOdvBaBk/jYC5PxOAuT87QTI+TsIkPPfJUDO30mAnL+LADl/NwFy/h4C5PwuAA+R898jQM7vJkDO30uAnN9DgJz/PgFy/j4C5PwPCJDz9xMg5x8gQM7vBfAwOf8gAXJ+HwFy/iEC5PwPCZDzPyJAzu8nQM4/TICcP0CAnH+EADn/KICXkvOPESDnDxIg5x8nQM4/QYCcf5IAOf9jAuT8UwTI+acJkPM/IUDOPwPgEXL+WQLk/CEC5PxzBMj5wwTI+ecJkPNHCJDzPyVAzr9AgJz/GQFy/kUAj5LzLxEg539OgJz/BQFy/pcEyPlfESDnjxIg518mQM4fI0DOv0KAnP81gMfI+VcJkPPHCZDzrxEg518nQM7/hgA5/wYBcv5NAuT8WwTI+d8SIOffBqBC1O8QIOdPECDnf0eAnH+XADn/ewLk/EkC5Px7BMj59wmQ8x8QIOdPydvvGpBaLbBdiytC5imWwZyyG81mTHKksT+fHjEtW0zxa2yOp3tCyr3TRZyKmtSXHMKo4Wb/kPUJMzLkX6NoESnaVWRfyRhnRotJozl6EqdfIdcWHBvpXHoYjaY3U4DGYXJwiCP1IdI7JIyjeBElY0D1GCKnzCWQOJ7gyB3jkgLwyiI+UldWumn1JNnDqW9IeE1dz+phs8cZYZz76x1yiMRoHmFu62J9b06eE4yM2jkljDAuKT3fLeSQikD2bEyZSC6YZ9dOkjTZQ1IlRR1Fdqt+UTRSJNypeLVcAe9Juj+dH4nXiNVEKf0psaaA8BBJ8oSSPyXWowlwODk4bAHibo1AWoesE0uzKi6hXr1Gvkecm09xzgAJJNlI2QDg/L5Sn0Vhs1V7nbgw41xaqkW8XlyMj6ZPJha4eLhlhBJX5V1MELtQZBMGIIzGjfhUjITcB7aTTOJ2TM2AvUFMMzmIwbeGDB41nVbORJ2VXU3YQLKKeyfN7PzwMGLqHM9TmJgsaqqj0+TwRkrYPYnnuM6KwwjKhBPK2ljdcakrlGtQMe6vx5AmxWYiGwfj09lhil1EroyKO+gUe4hc1d12MCBQ0N0aRStm90Yp1/ej8XgPtzMtNKRiJM8dYpXnYH5jc3oLA7xZyg3UAH1CyvPtSqMw6nu4SBql4gmcauZjTCk/AtUOczpkeA08X2XyCmMVdqmT9GtC3kxGC57NDLZdB1AjUKi4zpqZDnHEQm11P5mnCyvXGSbTgJ1V6ytbVIQwVobTo6MIgmX+Wx7IrgmtX0gFt97HlJVGMdRZ5tHoJHONlWahVWEYcxwxMWUpS06GPokqnRq1E1XpxYub0/mNXIQJLD8aY7CRGjEX5OxCM3bhGhPTkFRmKkIpg9Ojvek4Y5+qCsYNEQkUnDNJycDA+ZJuFtANWpgNXBWKzdnmYdEw1ELJGXDIJHAWghNsxRMGB8xTjyWnVc4ygHogvxrTj/djnH2hH2N9PxnH23ATmHSqGpVwBvrS6toRAiuOsJyNh9EyCVLkJrKeh+HGOEEkmp9SzHAaHO/x6LsHMiLEieSSzqYTWIIeaPV4sj/mZe8ENFWOa0naz5ti+K1Y11Jbef9ulGKB9fxqwxyrucrZ8d44SQ/BjONS2nAaxtFRp5SOgxi3D1JzsB3RWlxMmgoLFpy1UZtmdbJy94ObkBShLSOm3hFMl0Qw8h5K5Xfmu3Plr8RZ3aIElQXJu2jW+mUNHqnC+n2UBJFShfX9/TRewEZr82iUHHMPqJfxvYGiiO8r6WweRyNQrIYM8MrNnMn+FAam+HaEHB1rmwKR4SFST9nQjE+SYf64kN8v8QCiXjekhSOhOiQbCocrJ15NoF7THf084MNws86WtTtQSYe8bRDEKVaQe8I+M+eD1JiiM4Lek/0EDg8DRS/N8/uxibnQFYKnl0WOkAzwZAtJ1DWCwMVffksoCRctBmv5XWEN92KYR05Zz6oFcSND5PQrXbPXV4ev1UyATYTmgznDrFPeW2OUYta81h7g6hiXB7jUw+1e9lonzzDQcyh64nDpNAf58/BZchMGhXBIazKMvQKtuLwfqixRVm44vQi5htKhosLlvLmDuw11fSNwDZq9b8tgV12oGCz5PYgiwHOlug/VDw02Epj5IkDeAmdMhbGWHu/v43YOTqq2fzXAZYGbPJi8TgQXopaeHNCze0wUsIioIhGkpf4E7BY193jBPYU7MtoRVKBTbHvuBJdvUqyCojWdD+FlfHhEpLiRAr2WybKzlTEThtMa9Gw7u880O7vm9QCA7Kjdlg9RiIoLSviwkBE/NjEQDgsPqk2OjwL4HvSUCuyOmb8hVUs1NqCVYt85OEaEmWe11WGm5rUZAw9euR4R61sIqlifWjaILFgVO7GH+IAFvJmU36asCfj60g6JZyFsRiEl5v2cNhA+xKLAZZ7vbhNjZJ921OxWS7+o1nH14fqEGtkr24oOt4pfZY/Qu50OcRKWVtkYjEoPqBwz4xJiTikxWRe8mJbXe+hTbjnZlfNmfAjjg37AT9kRFwRTwFvTYLdtwz/aTqc5cFt4jWQzbg/xrKC/rpHmfFiMGeEhd3JgTg6gKOTaCHWVqpHg9Wnu51GxpqNrB3kO+h7PE8gjR0k6G0enygY3cI7QVWVykNYbHx8k2fZam6kK9IZu+vCCDjf0tDzV5sfj6HgyPNQd6jOF1B2OkJ3DEQDCCdRqAqwlaTMex8ifYWd1awpxmQF0Ix4BsDr52mbveQxdKIwsPmXhClA9j0iNgoc9Gc2YJEPuOAOZM0CYEBtnvjaIrUd6sI/B0IvOUBG8CuuJwezOprurXQemZWYDqa+jkIBNMCXjMyr3IWOWYXQAG33p7BBZpFgRhgI08pEZbCe/gX+tqFWqmuDRBY36nFBbgEY9NonU0jRYatTLSudcyUDd8HJsojeUMlc1pNFfVp581jJQN7wCPYvNcb2o6MYvHyJaLgCcU4BGvjKle1/DuQWlRn0FAlpxVjpfVHTjq0ZwGzg1/GQi1uWFSlUTmJF64+bkIPbFsqabN8u4bU+YdXJyd51BamLrCDEQ7Xez1KhmrKIhVrYaOi+dxWpymz2d1NWBF5T3LCE0Uasc3tXahGLvPYPUxFvIxatOeF+1rknalcz+GTmsmxxYSHQwj2aHNBKsxrq4/zaUJrxaYPPnknXxwO04TbrNqOHA0ucq6QbhM5cxmqxzlGCVOgkKkDwLRVbTzd1U7TrZuXFdPLta1yS9BaJIiCTgBsYGyWdV65rEPSy+Y8FigIXaGp8jnnMnvO7ioYaBTNwjTMRzxWdXqprgcY2xopl4nnhuUdGNvq6rr3SeLz6nrOnmgCIqXu1CAPFC8bw7oHWHsGjZyb+peZH43DNITdwn3kI0EPeL5+ewbtphtXJwe6b4vGWMJtvdu/3joReIF9yO06TXTrKxSwVCsZ9/FqvJr2OPGnusp+INUr6wrOr2J0ANVWkUKb6gitA0X0kfyc7De+JFZU03v5q23YNr44biC3NYN32Vmix3jTdJ8eK8otteE6vUPxXvlvKLMli3DBB/R9iG1UdEsCnxEvGS21Ca8LXa34M8P/uglF+8jNJ0EUc2VQhK4YPiMfElyxhNtocdcqozpxT3rfJLK3VNMdSnak4CV+HiclnV7aOUuws2o1XxYAbqhrgMI1aWQF25DaUJ97lAW/H0KF7MT3GhKx+qIjTNgV6iHEmqh5dRmu4Q/p99ufNKkRQV3fikqmcRBF58o1rXJGOF8qIRkw+QHFXrmmTCnRGBX53ep3lFt81SlZdQO3gTEF9dVnX7fJ9XaV0E4maSqnCPwJyeQWrixVwv1LSFuCUFbg6LqiY40Qu/CQm1UvP+oL6pBLeARbBTDiw2xS2FvIobOX5F1BSnqc4AlZRl0vgdUjyVpBrr6YM52YLr1wAqOlRP/68b4Xn6JG/hhHnU/doq+Y5OPrH/v54ekz0dW8igppMOTy+cIMb4uqVWiH9rcRwh1Ssp3qAuBTMSzHk4jxkscE9Qpfr6KlUbtgAvQrSokryxSuLOscYIehKPShV0MMY+H4+eiOdTNL2p2tTLHuX1BwH7eHo625hZlzjEfd7Z1ha2EIounsQrVaUZQT4VY9wxVnBenulN8H5Fs8MUflrKt0jEvuz8z0wOnhjiOWuGQ7U6igfYEMt88a1lQ2k2yhfhnt8oEQCRzkRjphGY7dvyeyjsznoRFZNvym6bmjFUn8w4Mlb17ZIXdEgjse1OZ514H6tX5gfwpW9eIvAZTW+jeEdJsTldLKZHd+DyLbfT3InRt5ZEZUvCLGOGxBCpBib3bbfThNh8lkneSW3RxTDDFLaIiBNhJ6B/fbvUtg371bdI8F/oTln+d0q4EEizVVG3Mu+ReOUrcSEWQHRAWaKa5W3Nd8k4Kj5I6uENEHrGUav8MsjD499QCR0cTacL3puh27tlMjmEWfGafRzoWIzleleODlTALBvekzeE8LES/QM52lbhpWx4b9Ggtq6y4QfzBu4bJfp9OboiT4ufAlEMtP+UTNKiCTr9HtR1Y475XpkSUnr4kMRrpqou293PyeP8ShBqqAal75M4kGFRch/cw+MnekKTrj6tX8ONEww8C0s/lC1pwDEqy/kRiVfPSlMZKD8s8QyapMsx8v0yVnqjUs0UlxcEgP9hUAbTfSRCkCpjBfQHgO5NJ/3ZCFt2xuJHMjFhcrCPoaJGq/DxkDoscdgNMIUfk7iegSEeJuMRxGomJwgNvFf7YMW4PAS8eH6CxxvyxRA/TkYTrCIalXrbuKopUfyGc0P8JO1fR4vsRu+9EllCqpgUB/9fkIhDKnJALPQNQS6u4om2HD5MjmKkFbDRn6lSdiNU8F951M9KVPKWijN8SI5ibFgTVcf5BQuGJAUdPly5CdO5G3YG+fPyjka3WZDC8D4io+zi4RclnoChruW9q6OSoJ3MMhqY4QRTPVASqNn9qMQ78fRESZLHZdXwPgmWWQOvEBZgnBNgrX4pbyvFccpJw8zwxnyGwizvAz8g8fas9oRMtg08QS9gX32sbmdJ6lW8SetbC84IZPKjeIg9QLQbuRM3bOmvrFIxl79c4Pf3lxo+VlnB4HB6PB4FR9hMTPUuSDv9FZkyodDpxavwrq2q5cEiy5uwiL+qmyCcStnLho/rhl31INUSv6arOtdG/deVOhBV1KVTiNfwmXY2rC6vEn4jr6uA85uw4Cwck3wDL+RJauGBGi/kGV082skUtIHXcq0gLlRx1/NRKX8HbCA+7HIeHM/oy1mYYmgyuV8y8jKB+IQWN0uz4JCcVAtv7QWDNOPwNAx+VxYPduJPJJ7kb8Sn4Tw5OIAH/7EUn4T8AV1/C5YwA/3vlR5ZMZwUD/by9+XJFC5qn2D23iEelKmfP4C14F61/zQR8lNafm+OFZ2fFvL/4RJaLa+DB+wUKeN/0E3ZjCtNrxL/MWtiIMq6Qmx+B/qfdEu26r5a23Xxn5ewejMH+o8kTZ3pGvPqzRgTQPRBzMRE8Sb3X3QvNYoaPojH+8ht/zhLSjpQZQo3kv+VhJnmPGzjML3THd71IdGj8n9Lyj+R9J0OckO19L8txX/De+GZ57h3SvGn3ABu+0O68+K/c50ZMbmpwTPgAeLPSpyNYAPM/ygxEC7b2z4uxf8s8ao3kj4c8/9XiUV/jfvfenQ6eeYZ6+L/FJ6BzrjP/W4p/7w0DuDgaZMDD/cBC+hf/N9lcrxkvUvKT0u0qoTPnhwftXAgg97hU+L/SfgwPMNadqfPSOcO9HjC6PBSUYLz0+obN9GzDAlG+tIVb/HSoDqLFTDw8pwu4MsNIfeOx1j0EJOBl/ACmEmZWpROfBKPQaIerXvH6jtf3OZrTpNYczLGAFXvT+LN5A69jc1yADw7+U3b13ej/V5ZkU6viTcjQHi+GXT0d4e1Ts4at8UdU/2Jgsj65DSy4JJjyic4pUTtuZixvm6FUFioT0lh6IYUniaXL5WL/raiNVaSkk8INPZczLNALW2uUF/RUNlbazfiarip3yGCNMo9oNzFVwpZTMVSGBdKsh48CEuISZW4EKTId40SU5ViKdutlzTlgBUp7rgT8UWJToN2xabNV5sco5OZNTrA+I7b8vrZ7f1cOeCZ3GlDy9vCnsF2XAafh+nNI02AXVTnlhcKJcExKt5o1CY470MiJB5pJZHll+dqQMC1bFWaOu0SjW37+qZr+rRJGOh2z93Fywq/58eTinrRlNc23Wt4j7QBG17wMIpasOuEVnvgqa+i69vlWht87ODXN3gGk1gmhc3G+iNYSxtC603JMPQHJurEiTU1dpL4Jjc0WO4wmpxEKbNrHMWQqKT8HmWGZHQMlZ2ADroyVL0ZU5e8XK7pTluaW139YR5Z6b/Ne7GQul0x7UyHak2gS6OCRsDX68pPYZ64naM1ToY3hORXFquQRmkc/QO1Nl6uYWlMMHvQZ8lssWhGqJWBbEibi5DqxR9QNoI8nC7S2XSRVY30ZjTL4HzVis46FDWmupZR/WUMZrnJOKW/Zm31rNsmIucMF4ILZ4Qzt2hA1ykcFvkr4ht0aezBcQPcicR8r8Jw2eip+LREuC3MujxNCqPl+ruZcfk2nosDWpHEKV0FSw+999Sei9MyRliZwv/UYJ9BaJ3EN4uKcUbGJmWsAcpnAwzmkqRtTelMevHN26aASY0K4f4/nHtZAI+vULBufq3t4AlbiW1uur4GpeV2u06oK8Zy1+34dJ+XbfDBmeLyRjzdQucHEID3BsYCESddREczVLIHzixfQpe95VnlinWwt9yCsRmpoi9MCS+Jemx9toMd4CppkStVCyTeAAHOogPoARcZb8LrtWaaCZGKNxuyVhWyriwcyX/pKw3wWHQxIT5SGnKB2EQH7iOIoQXchXHv0l/9ZJFSbxRZbKoNs0uhOkLsQaxDaINOrZz/T7EqR8p3/wwvdGnukcjP1qZ7GOgEwopVuT6KGVN6muc5rCmWWXloivRHbujJ5V6ZItGReHZb9qFU/LmUFzDUHNJuiItKWzlNZkUwqbuW8N4d/AjdQ3H3IifJ2Tfpo5+W8tIMtXK5UvENhrxnWFHlWwxxb4AJIMXBQ9TjxzHuofm+rmN7L4snuD/CSQbWQISl9J1240UEnhFWYw/v/jhNxGOetmgn0H8+gPEAJYbVyuryGBBJAbVJyREHI1mnTvL6Ww3ZULzFLbmSIi2OxpnWV6Mh0ulU1MVaytQziNVrBVrW83rIYV8uzuV1C6cXLJRCv0JszKBZ7ugNcV6BmeTY4VQVRxs6Fhhe1AN70el4Go2AuCtd0lcCQd9myLsrEylU83ZDXNoHpx3k5pg65nuP4u6kHhUcjcen7vEiTUaxPRmOYTHYgJUrS3GvIvSgQoTEUNyHMx+SBimeMYZTjPuT0TTgkUG8w5D3K5QfV1APNJP9fevwmJvdekUymK/UQQIv3yP9MUEPzVA9vEPtOWq4uoYznTZ0zUmV4UEZkGNlSO6pqW7NIHd4CAmJwhCriNYJpwh9txOY6nx4eIoh5NrsLG6doubaNeoTSJMLi1ZtW1h/SJvNCIc8xAtWNzkMqep/AeMOAACtWWd0VcUWnjNz701CgEAogYQSIiAWJDQL3jMHBASfoiI+RZ/4EhUVxYg0wQeB0Iv03tsDRJQOAoYYEJTeFZBeVHpVlIfA+759Erzr/WAt13osk+/L7D179sye2bPn6DhaGRUIOEppFXCCDd5/vcN7LTPaq5AT3U0pFaOKqHilHCV6qoIK6OCz6W+1TK7+p0ZBAv4JxDnsUIy8RubmTZvyf9jwIQ1pMZRCQ09ktG/ZNiO9dfIzGa07J9dPz+iY3k6F1F83O9iBg1/GbkugbQdOFgo2eT/jjfTOyVWTH2/bCqRO8iN1UlOr1kjFb3gelT9IbB+lPu2p1FR/tH5K3S0DDlTd+xdShWXUEpCr0ln4lUhRkiqjyupyqrxKxnpUUpUxuO66ZvXq/B8qGf7CejqwV6Xb+HHj1D3PdXit1bvquZZvdWid3lbJX1Xz/7rXuZO/gXwngxiqZ/F5d+s+6pM5plX53mcCbI7qoVRuUIWS8B98ERUEFSKF1sz7+45WjqN7qO6jIyVOKPP545UQWN1T1X01UqJDmdMbPqgcA0n3a5ESE8rcOyNVOQHdSx1pHCkJhDJzpyQqJwhJ8uBISTBPEoIkbUekJBTqMnTNr8qJgiT3YqQkKtR1yaQL7NNbpSVESqLz+kRDUuTuSElMKLOwvk85MZAMfTJSUiDUdWW53sopAMmR1yMlsaEuMo6BJK1dpKTg7Zn2Vm3GRUoK5c0nCEmR7EhJ4TxJLCRphyMlcaGuhyqG/PnkXoiUFMmbT0FI2tyKlBQNZS6ZVI3W+qgF8ZGS+DxrhSA5khgpKRbKXFmuoS9JrRYpKZ4niYKke/1ISYm8tS4MSW7TSEnJUGaDgff71vq9ESlJyLNG3/Z2ipSUivAtOitSUjqvDyXNR0VKEn1JdEyM48i5uH1KlO5W5ZVqpvj4rMbHrpW4npXTPO3xWjcOFa335suVAio4NaQK4khoGLlfPeB0U90dleWoHjgljurlqN6O6uOovo7q56j+jhrjqMlO6JyZiS4bHbXJ0VsctdVR3zlLY55UobhpSB7zGx11YU6ZLZs3C9nQMcedNWHtoyau6iL3lxvPh4nd38kOa5IXC1f1RBI+XM2jaru3q3vSt1bNmh6NEXXsnrssiXnpkVpCNnS0dmpiNU+Prr/J3vPKEKuvVinjscXEfFbGw9bz6tYu5/U5A2tKJXvs02JIiqCmGomhmGRV+5qeDNzVq+3REyJd0yR0ViT0nqoynT/mVPcwPUVjAKVpHqhkPKCiA6JKj9iXSGOaJHaP4byO24f717Om2fJDtkb0/XZV+12Cuseor4WYs02XC6lVc7Go6gdfrWOlMwnNGRLax1SsDAjXLRxQP21PEdRcSKBSgxCiTy8Nh4G7sjknIa2GnWNkXPNYWkv3+06n5I+6tV+1Ov3HZ90V5XpbzZYdKROsqNz7yja7eNIFd2riBWuQ6WyJeVEerRJNr9yNQk5eP4UQQWPWhIDHLpumBT2x8fzxoBeVNcoSaV0avu/USjQ4rnShI7TBoQ3DTFc5CtGfxVMP9XcNF4Zk07R1dmfKftd0GLHX3te3pP28zA/2WrPXrflqyg+21bD3LFHGI1nVfoRodBgx1kqXA9dy4MA6CHZZMTr5ws+WoxA5byHnu3i+xvhxpaXLs4MSxIbmkLSu2SLjUoWt7COe0QhdpVWimo1wXJz9jcRGjgFQxe6Z4Z+YZweNYSjCRAYalse4GzretCJZvdHBJprh/t7M+EdoRbmgR2NEvap9MXgT9MwDi8oKwapZUS2k77PsS6QxTcKpmTpLGtvGR/9j985oY1sM0TyHH0soC+m5guZqlQNCvn3yN+4Aa77rFOM9/dp2S7xaZaLVJPRVJHSe6jIbpDU5FlmjjKDGtpPdaRa2PSkk9eAJf/+u3niUYQ8TaUyToAiwIvniyiobPrzN9jmzwxrkDPv34z/apGqTBE3F/Z2FbP+tmW33NjT+VfwB++82qyyRNjQJrYqEw3Q+Vdkfd+LaZHGEQQMozeUEKnUCgUKEZe8Z/BLCmGJfuSapWgu3UsixPC7le79r9ZbNTyEM2AtsOfbRSCsqTz20QfZBjeizVoxwbWiVaN77+Ush3JTc95qEyciQjM2o4SVVO2i3/Ya8NXHtETt0TW2P8yRqxpEE6+N4JIy0qDL07EukMU0isyfh7Kkqs2dfTBUZ+6Y/+49b/yzE7G5yTAizlKiemLlfVo5IY5oEE3YNg4OpZXNaROX0OTMMgRjmIt0sFYJFxXE85x9UlFByDN96803/XN6Y84Ec1Iuz+/gNv9wYKRpfTRlvTb+S++yt3csh/cYyp+BCWCLh5ihEszPlH0KKNn/E1+gwopR0icoqgdUbYfWxj4rTV2tI6BD7EtXGgHIG1EsTx2V3kLwfb4hhsy55gYtaI4wd5r4f39PFKUxwke1c4tOvFeGxTHC57x58daV74FqmNRyTme7d7PZWjgf97nxqlk+GrllqDQnD3St3gCBOw9tC5nzzpB1Q74g1uGGsLbDHcnd+4G60cqSZqTgz3hMykYf7r7ZfPlFQUBfrmeuSYBLzhHyYM4U5xRqkPbdK9fXIYSNcXLN0cZTLVWUXHkTD0Jxt+rtNPVhR8oSZe+k52Zij6w8URHZeK+SBRQftS4/8Ys3S9VdxtPZZ4h9zFlpNwn0hEm6UWjWv+DtnXfJF2UqF9BlBJKpdQkzwha1CsKK+aol530pfIo1pEuwr1+AvO7p+rMuVnDWhQdggeoxRdn7wlDN0TQcG2UXKmijkdOWFcvhkwZmZiXJYSUaW6mVRSwzEFDpac3lnE9tgYGv79a9VJI+YkaUCcCEMtYAkfGnAcXS5fbkv4GwjGSZ/XDVFK4f9Wwx5LAcHNlnIV1MSaSdHIoabM4eIjeY3IA/l0LMTM5NyNLfBF1duhLFAxVwuI47WjfDMNjek9XyXW37D3wpqDx65zKpY3FSkHTnWgjph31YhBslaCNYX+0h5+vLOQTb4QmGrGUS24PgfhedB73rmaUE9r5EjacPQNgl/yLGEIY8DE2HRb2DaeCwt6NFXnbKgrT1duXqOuZ75jsy8X8mXBHX+mqjiykFf+ccC1P/3BR6iiK7LeJjJF2YLQdZ2EXdrjjwzCAdugCWGD6PoI/m92QxfsrDtJ6Javvdcv+/UxPlY7WxBXWfJepQj8xncLULSf9yO+EP12Ee7LfsSaQwJYjcS7xBfwvGoKg6wLz2iMaKmeRK1C+HOr7Jwb/4fa1/WQiTm49ZRQr7+NdqvVnvlFpCcTqQxTYKaz5cMqJcsqhs6lvP7Dj9XBok+IAjHw/Y2aTFkjdUHrt0UYnY10aiV1+AgGY8VjmFZxtuJOL3hMqtJVm+c5ktiPpsoqv1K4n7mrigdGI3K6KYlivnbhFPH4Q3LsWb1KYuD/S8HHwdX8M9qdScWFadT/pCVAkLtTuURzgTz8BhkvTuVR2Mz4mWTszYXwsFFldUQ+xJpTMoj3oQGY4kqSw2iZkohQQ28TEjR5it8I8PPZUvuJPJcaBIUtFYkZV8+getphcU8WT8vs3VrH8JpWSgI14YLQSJ+TwizETeeLBTvV+KuJtPvVMl8mFNe1pIXECCikjmHNcWYWKiyPPPThPA2ON+lvGewy935jSqwKnGxJJ4m4VNHJHh9iWrpwIN+3x+2PsQdIYgaIMmSoJyvJAR7ErGHKvrhoqjl4Qf3Q3VPk9C8SDgeVcUB9qVHNEbUNE/yl3cC110kDARVJTLsy1DRGBGHvbjEzjy3vJwQ3nuiylcX+xJpTJPQvEg4HlXFAfaFQ4rGAP+z3OiDo7zYT0okzFKYl5+27tq/QhIaj5oktJ+2H/MlLMqpyrtS+g4ec54OCOrJF+62JJhSDSFnmz5sRfU83hvsS6QxTULzIuF4VBUH2Jce0RgRx9T31fcaE1AyMlDRFZktfeP0idAKi9dMYCKZe2mnS9WWjx52pS8LCqgJitckMjIJXRFV+sa+RBoTr9EvLBKOR1VxgH3hkKIxgBKvgUpNQgW3aVpDaZVMA1S4aP1+uJHEEBGFY1ga4ITkonteiXNxO32CbdfVIi9MxB7+kJERxLeCpigjOyEgpS3fRayCXKYCPuT4SEdRnOSymiHGVb3sNyxsGy2HaXrDkp5BVnXLvlxRNjd2vGdKB15AFVjb4xOBiCt9lRBUKhgaGrd2SyWGDWw8WyDBw0s41nvqoRhUY7G4Da5YaWg6aA8qaF7Ka6xh9nqx8OeopC/5BW/CvsE4bTPCUB2IeddCRcXifMajmAOuLvwbfq6LIDK7v3bKoUuPpc205uT1OUJ4AwweM89KocYJs2r858oNfMocx6T3w+Rxm7IAEydJPRjAlbAPy1vIky54VMktsiMlyROj/E7CUYiYeFchn5d52ddg0NiFpZPYYHFLo0QZhYTDUkP8YBc6RhviKY3SdY5CVJPwjGPmRO7JNsV61hXCAp8lG5fHxS6wLO4PVcTzo1Ioy+UKEissWOQ3jM3YKRp8hBkGf2pinEcbu5rg5uUnGgaQoxANkz0JM4lotHu7KD5UxXlxVeMxOdiosCDeG1lqrSXKKCTIrpYa4sfpykU9OkYb4ilfynSdoxD9WZ2YOcHFI369ED7V+SZFUXiRQccFcwl1Sz+e+cvYLLNg/rJ9fNliv4E7hxosB6ULv8nEfHYAX0DiPUxzg0SHoxANjwRJ+PAzvgbLOnbhDUQbmomc1jVbZFyq0BH2Ec9ohK7SKlEdQ3h4v2D/KQZPyPxG6X7awecJSTtEHPgwSrrGuKzSOefGLl84zPZ4Prhyh7Z8dIo1THaOyoUD67ELdlvDk8KLmDignvKkgeFAxmZpz423TKZ2X9/RgoYvUhLew3IET16/h7UzYlQBOfaWldu2aPNr7G9nNLxqDV+Djy+7gqIxykecNpcE0R8mhGEUVVh32ZfI6p4fMNwGAwvislyCh1lpz+B/U/CdIRXJ5Z1VPYM5y71KD4kYbrsQpDI+Ijypy14vUsojYqn9Bhb4/LzDZxTKnDOoI+Yhe22wT7821OJB0AQ7YpGrefeRyAcbEj716L980uESE3kC7vCxh1sBsVM0BuAzzw+rUv8F(/figma)-->Lunes
                                                &#8211; Viernes: 9:00-22:00</p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-0a15084 elementor-widget elementor-widget-text-editor"
                                        data-id="0a15084" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p><!--(figmeta)eyJmaWxlS2V5IjoiMG5BaWRiRGltQmdDdllZd2NoNUM0RyIsInBhc3RlSUQiOi0xLCJkYXRhVHlwZSI6InNjZW5lIn0K(/figmeta)--><!--(figma)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(/figma)-->Sábados:
                                                12:00 &#8211; 20:00</p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-e410abf elementor-shape-circle e-grid-align-left elementor-grid-0 elementor-widget elementor-widget-social-icons"
                                        data-id="e410abf" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="social-icons.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-social-icons-wrapper elementor-grid" role="list">
                                                <span class="elementor-grid-item" role="listitem">
                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-repeater-item-a377f51"
                                                        href="#" target="_blank">
                                                        <span class="elementor-screen-only">Facebook-f</span>
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-facebook-f"
                                                            viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                                            </path>
                                                        </svg> </a>
                                                </span>
                                                <span class="elementor-grid-item" role="listitem">
                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-c704770"
                                                        href="#" target="_blank">
                                                        <span class="elementor-screen-only">Twitter</span>
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-twitter"
                                                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                                            </path>
                                                        </svg> </a>
                                                </span>
                                                <span class="elementor-grid-item" role="listitem">
                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-423eb24"
                                                        href="#" target="_blank">
                                                        <span class="elementor-screen-only">Youtube</span>
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-youtube"
                                                            viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                                            </path>
                                                        </svg> </a>
                                                </span>
                                                <span class="elementor-grid-item" role="listitem">
                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-pinterest elementor-repeater-item-2d90580"
                                                        href="#" target="_blank">
                                                        <span class="elementor-screen-only">Pinterest</span>
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-pinterest"
                                                            viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z">
                                                            </path>
                                                        </svg> </a>
                                                </span>
                                                <span class="elementor-grid-item" role="listitem">
                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-google-plus-g elementor-repeater-item-c3a3ead"
                                                        href="#" target="_blank">
                                                        <span class="elementor-screen-only">Google-plus-g</span>
                                                        <svg aria-hidden="true"
                                                            class="e-font-icon-svg e-fab-google-plus-g"
                                                            viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z">
                                                            </path>
                                                        </svg> </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-700d515"
                                data-id="700d515" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a04b8e6 elementor-widget elementor-widget-tbay-menu-vertical"
                                        data-id="a04b8e6" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-menu-vertical.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-menu-vertical">
                                                <h3 class="heading-tbay-title">
                                                    <span class="title">Información</span>

                                                </h3>
                                                <div class="menu-vertical-container">
                                                    <ul id="footer-01-W4vzK" class="menu-vertical nav">
                                                        <li id="menu-item-5980"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5980">
                                                            <a href="/contacto">Contacto</a></li>
                                                        <li id="menu-item-5981"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5981">
                                                            <a href="/favoritos">Favoritos</a></li>
                                                        <li id="menu-item-5983"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5983">
                                                            <a href="/mi-cuenta">Mi cuenta</a></li>
                                                        <li id="menu-item-5996"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5996">
                                                            <a href="/seguimiento-de-pedidos">Seguimiento</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-28b28bd"
                                data-id="28b28bd" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-9b39443 elementor-widget elementor-widget-tbay-menu-vertical"
                                        data-id="9b39443" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-menu-vertical.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-menu-vertical">
                                                <h3 class="heading-tbay-title">
                                                    <span class="title">Categorías</span>

                                                </h3>
                                                <div class="menu-vertical-container">
                                                    <ul id="footer-02-K96Fp" class="menu-vertical nav">
                                                        <li id="menu-item-5987"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5987">
                                                            <a href="/categoria-de-producto/tractores">Tractores</a></li>
                                                        <li id="menu-item-5986"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5986">
                                                            <a href="/categoria-de-producto/motoazadas">Motoazadas</a></li>
                                                        <li id="menu-item-5988"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5988">
                                                            <a href="/categoria-de-producto/sopladores">Sopladores</a></li>
                                                        <li id="menu-item-5984"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5984">
                                                            <a
                                                                href="/categoria-de-producto/cortacespedes">Cortacéspedes</a>
                                                        </li>
                                                        <li id="menu-item-5985"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-5985">
                                                            <a
                                                                href="/categoria-de-producto/desbrozadoras">Desbrozadoras</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-3fc39a5"
                                data-id="3fc39a5" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-c982785 elementor-widget elementor-widget-tbay-menu-vertical"
                                        data-id="c982785" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="tbay-menu-vertical.default">
                                        <div class="elementor-widget-container">
                                            <div class="tbay-element tbay-element-menu-vertical">
                                                <h3 class="heading-tbay-title">
                                                    <span class="title">Legal</span>

                                                </h3>
                                                <div class="menu-vertical-container">
                                                    <ul id="footer-03-sbCUO" class="menu-vertical nav">
                                                        <li id="menu-item-5990"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5990">
                                                            <a href="/pagina/aviso-legal">Aviso Legal</a></li>
                                                        <li id="menu-item-5995"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5995">
                                                            <a href="/pagina/politica-de-entregas">Política de Envío</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                            <a href="/pagina/gastos-y-plazos-de-envio">Gastos y plazos de envío</a>
                                                        </li>
                                                        <li id="menu-item-5989"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-5989">
                                                            <a rel="privacy-policy"
                                                                href="/pagina/politica-privacidad">Política de
                                                                privacidad</a></li>
                                                        <li id="menu-item-5992"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5992">
                                                            <a href="/pagina/terminos-y-condiciones">Términos y
                                                                condiciones</a></li>
                                                        <li id="menu-item-5991"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5991">
                                                            <a href="/pagina/politica-de-devoluciones-y-reembolsos">Devoluciones
                                                                y reembolsos</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-b2ee4b4 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="b2ee4b4" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bfe6bb1"
                                data-id="bfe6bb1" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-543fccb elementor-widget elementor-widget-spacer"
                                        data-id="543fccb" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="spacer.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-ebb0e55 elementor-section-content-middle elementor-reverse-mobile elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="ebb0e55" data-element_type="section" data-e-type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7327af9"
                                data-id="7327af9" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-ffdb546 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                        data-id="ffdb546" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p>&copy;
@endverbatim
{{ date('Y') }}
@verbatim
Remolques Titos. Todos los derechos reservados.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-433c9bb"
                                data-id="433c9bb" data-element_type="column" data-e-type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-807fcc4 elementor-widget elementor-widget-image"
                                        data-id="807fcc4" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img width="383" height="59"
                                                src="/wp-content/uploads/2020/12/pay.png"
                                                class="attachment-full size-full wp-image-6517" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="company-legal-info" itemscope itemtype="https://schema.org/Organization">
                    <div class="container">
                        <p>
                            <strong itemprop="legalName">REMOLQUES TITOS S.L.</strong>
                            &nbsp;&middot;&nbsp; CIF / NIF: <span itemprop="taxID">B18392092</span>
                            &nbsp;&middot;&nbsp; Forma jurídica: Sociedad Limitada
                            &nbsp;&middot;&nbsp; Fecha de constitución: 22 de junio de 1995
                            &nbsp;&middot;&nbsp; Registro: Registro Mercantil de Granada
                            &nbsp;&middot;&nbsp; Estado: Viva
                            &nbsp;&middot;&nbsp; Último cambio registral: 21 de diciembre de 2025
                        </p>
                        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            Domicilio social:
                            <span itemprop="streetAddress">Avenida Los Emigrantes, s/n</span>,
                            <span itemprop="postalCode">18560</span>
                            <span itemprop="addressLocality">Guadahortuna</span>
                            &nbsp;&middot;&nbsp; Provincia: <span itemprop="addressRegion">Granada</span> (Andalucía)
                            &nbsp;&middot;&nbsp; <span itemprop="addressCountry">España</span>
                        </p>
                        <p>
                            Teléfono: <a href="tel:+34683573516" itemprop="telephone">+34 683 57 35 16</a>
                            &nbsp;&middot;&nbsp; E-mail: <a href="mailto:contacto@remolquestitos.com" itemprop="email">contacto@remolquestitos.com</a>
                        </p>
                    </div>
                </div>

            </footer><!-- .site-footer -->

            <div class="tbay-to-top">
                <a href="javascript:void(0);" id="back-to-top">
                    <i class="tb-icon tb-icon-angle-up"></i>
                </a>
            </div>


        </div><!-- .site -->


        <script>
            window.RS_MODULES = window.RS_MODULES || {};
            window.RS_MODULES.modules = window.RS_MODULES.modules || {};
            window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
            window.RS_MODULES.defered = true;
            window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
            window.RS_MODULES.type = 'compiled';
        </script>
        <script type="speculationrules">
{"prefetch":[{"source":"document","where":{"and":[{"href_matches":"/*"},{"not":{"href_matches":["/wp-*.php","/wp-admin/*","/wp-content/uploads/*","/wp-content/*","/wp-content/plugins/*","/wp-content/themes/zota/*","/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
</script>
        <script type="text/javascript">
            var xlwcty_info = [];
        </script>
        <script>
            (() => {
                const lazyloadRunObserver = () => {
                    const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
                    const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                let lazyloadBackground = entry.target;
                                if (lazyloadBackground) {
                                    lazyloadBackground.classList.add('e-lazyloaded');
                                }
                                lazyloadBackgroundObserver.unobserve(entry.target);
                            }
                        });
                    }, {
                        rootMargin: '200px 0px 200px 0px'
                    });
                    lazyloadBackgrounds.forEach((lazyloadBackground) => {
                        lazyloadBackgroundObserver.observe(lazyloadBackground);
                    });
                };
                const events = [
                    'DOMContentLoaded',
                    'elementor/lazyload/observe',
                ];
                events.forEach((event) => {
                    document.addEventListener(event, lazyloadRunObserver);
                });
            })
            ();
        </script>


        <script type='text/javascript'>
            (function() {
                var c = document.body.className;
                c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
                document.body.className = c;
            })();
        </script>
        <script>
            if (typeof revslider_showDoubleJqueryError === "undefined") {
                function revslider_showDoubleJqueryError(sliderID) {
                    console.log(
                        "You have some jquery.js library include that comes after the Slider Revolution files js inclusion."
                        );
                    console.log("To fix this, you can:");
                    console.log(
                        "1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on"
                        );
                    console.log("2. Find the double jQuery.js inclusion and remove it");
                    return "Double Included jQuery Library";
                }
            }
        </script>
        <link rel='stylesheet' id='wc-blocks-style-css'
            href='/wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks4efd.css?ver=wc-11.0.1'
            media='all' />
        <link rel='stylesheet' id='woof_sections_style-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/sections/css/sections8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='ion.range-slider-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/ion.range-slider/css/ion.rangeSlider8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_tooltip-css-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/tooltip/css/tooltipster.bundle.min8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof_tooltip-css-noir-css'
            href='/wp-content/plugins/woocommerce-products-filter/js/tooltip/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-noir.min8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='widget-image-css'
            href='/wp-content/plugins/elementor/assets/css/widget-image.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='sumoselect-css' href='/wp-content/themes/zota/css/sumoselect8a54.css?ver=1.0.0'
            media='all' />
        <link rel='stylesheet' id='widget-icon-box-css'
            href='/wp-content/plugins/elementor/assets/css/widget-icon-box.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='widget-social-icons-css'
            href='/wp-content/plugins/elementor/assets/css/widget-social-icons.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='e-apple-webkit-css'
            href='/wp-content/plugins/elementor/assets/css/conditionals/apple-webkit.min9c92.css?ver=4.2.3'
            media='all' />
        <link rel='stylesheet' id='widget-spacer-css'
            href='/wp-content/plugins/elementor/assets/css/widget-spacer.min9c92.css?ver=4.2.3' media='all' />
        <link rel='stylesheet' id='woof-front-builder-css-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/front_builder/css/front-builder8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof-slideout-tab-css-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/slideout/css/jquery.tabSlideOut8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='woof-slideout-css-css'
            href='/wp-content/plugins/woocommerce-products-filter/ext/slideout/css/slideout8b46.css?ver=3.3.4.5'
            media='all' />
        <link rel='stylesheet' id='rs-plugin-settings-css'
            href='/wp-content/plugins/revslider/public/assets/css/rs6ec8f.css?ver=6.6.20' media='all' />
        <style id="rs-plugin-settings-inline-css">
            .tp-bullets {
                width: auto !important
            }

            #rev_slider_1_1_wrapper .tbay-bullets .tp-bullet {
                width: 8px;
                height: 8px;
                background: #ffffff;
                border-radius: 8px;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                -ms-border-radius: 8px;
                -o-border-radius: 8px;
                cursor: pointer;
                box-sizing: content-box;
                position: static;
                float: left;
                margin: 0 4px;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s
            }

            #rev_slider_1_1_wrapper .tbay-bullets .tp-bullet.rs-touchhover {
                background: #0d6dd7
            }

            #rev_slider_1_1_wrapper .tbay-bullets .tp-bullet.selected {
                background: #0d6dd7;
                width: 24px
            }

            /*# sourceURL=rs-plugin-settings-inline-css */
        </style>
        <script id="jquery-selectBox-js"
            src="/wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min7359.js?ver=1.2.0"></script>
        <script data-wp-strategy="defer" id="wc-prettyPhoto-js"
            src="/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min005e.js?ver=3.1.6"></script>
        <script id="jquery-yith-wcwl-js-extra">
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            var yith_wcwl_l10n = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "redirect_to_cart": "no",
                "yith_wcwl_button_position": "shortcode",
                "multi_wishlist": "",
                "hide_add_button": "1",
                "enable_ajax_loading": "",
                "ajax_loader_url": "/wp-content/plugins/yith-woocommerce-wishlist/assets/images/ajax-loader-alt.svg",
                "remove_from_wishlist_after_add_to_cart": "1",
                "is_wishlist_responsive": "1",
                "time_to_close_prettyphoto": "3000",
                "fragments_index_glue": ".",
                "reload_on_found_variation": "1",
                "mobile_media_query": "768",
                "labels": {
                    "cookie_disabled": "Lo siento, pero esta caracter\u00edstica solo est\u00e1 disponible si las cookies de tu navegador est\u00e1n activadas.",
                    "added_to_cart_message": "\u003Cdiv class=\"woocommerce-notices-wrapper\"\u003E\u003Cdiv class=\"woocommerce-message\" role=\"alert\"\u003EProducto a\u00f1adido al carrito con \u00e9xito\u003C/div\u003E\u003C/div\u003E"
                },
                "actions": {
                    "add_to_wishlist_action": "add_to_wishlist",
                    "remove_from_wishlist_action": "remove_from_wishlist",
                    "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                    "load_mobile_action": "load_mobile",
                    "delete_item_action": "delete_item",
                    "save_title_action": "save_title",
                    "save_privacy_action": "save_privacy",
                    "load_fragments": "load_fragments"
                },
                "nonce": {
                    "add_to_wishlist_nonce": "d1c95da827",
                    "remove_from_wishlist_nonce": "6abf9672c2",
                    "reload_wishlist_and_adding_elem_nonce": "9832438a47",
                    "load_mobile_nonce": "74b3497e1e",
                    "delete_item_nonce": "a33ad8e296",
                    "save_title_nonce": "7dba38c57c",
                    "save_privacy_nonce": "207a88e146",
                    "load_fragments_nonce": "a55928f465"
                },
                "redirect_after_ask_estimate": "",
                "ask_estimate_redirect_url": ""
            };
            //# sourceURL=jquery-yith-wcwl-js-extra
        </script>
        <script id="jquery-yith-wcwl-js"
            src="/wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl.minba25.js?ver=4.17.0"></script>
        <script defer async id="tp-tools-js" src="/wp-content/plugins/revslider/public/assets/js/rbtools.minec8f.js?ver=6.6.20">
        </script>
        <script defer async id="revmin-js" src="/wp-content/plugins/revslider/public/assets/js/rs6.minec8f.js?ver=6.6.20">
        </script>
        <script id="woocommerce-js-extra">
            var woocommerce_params = {
                "ajax_url": "/wp-admin/admin-ajax.php",
                "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
                "i18n_password_show": "Mostrar contrase\u00f1a",
                "i18n_password_hide": "Ocultar contrase\u00f1a"
            };
            //# sourceURL=woocommerce-js-extra
        </script>
        <script data-wp-strategy="defer" id="woocommerce-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min5ae7.js?ver=11.0.1"></script>
        <script id="wp-api-request-js-extra">
            var wpApiSettings = {
                "root": "/wp-json/",
                "nonce": "0665efc159",
                "versionString": "wp/v2/"
            };
            //# sourceURL=wp-api-request-js-extra
        </script>
        <script id="wp-api-request-js" src="/wp-includes/js/api-request.mincf35.js?ver=62f04fbd8d53f7e0c9a479a401b9be99">
        </script>
        <script id="wp-hooks-js" src="/wp-includes/js/dist/hooks.min4ce2.js?ver=f0f188028580e8dc1255"></script>
        <script id="wp-i18n-js" src="/wp-includes/js/dist/i18n.min99af.js?ver=1dfe7db3940c23ea9216"></script>
        <script id="wp-i18n-js-after">
            wp.i18n.setLocaleData({
                'text direction\u0004ltr': ['ltr']
            });
            //# sourceURL=wp-i18n-js-after
        </script>
        <script id="wp-private-apis-js" src="/wp-includes/js/dist/private-apis.min6a72.js?ver=eb85f28c4c729bb4f002"></script>
        <script id="wp-url-js" src="/wp-includes/js/dist/url.mina334.js?ver=7b0de086d4ae11d55704"></script>
        <script id="wp-api-fetch-js-translations">
            (function(domain, translations) {
                var localeData = translations.locale_data[domain] || translations.locale_data.messages;
                localeData[""].domain = domain;
                wp.i18n.setLocaleData(localeData, domain);
            })("default", {
                "translation-revision-date": "2026-08-26 20:45:30+0000",
                "generator": "GlotPress\/4.1.0",
                "domain": "messages",
                "locale_data": {
                    "messages": {
                        "": {
                            "domain": "messages",
                            "plural-forms": "nplurals=2; plural=n != 1;",
                            "lang": "es"
                        },
                        "Unable to connect. Please check your Internet connection.": [
                            "No se puede conectar. Revisa tu conexi\u00f3n a Internet."
                        ],
                        "Could not get a valid response from the server.": [
                            "No se pudo obtener una respuesta v\u00e1lida del servidor."
                        ],
                        "Media upload failed. If this is a photo or a large image, please scale it down and try again.": [
                            "La subida de medios ha fallado. Si esto es una foto o una imagen grande, por favor, reduce su tama\u00f1o e int\u00e9ntalo de nuevo."
                        ],
                        "The response is not a valid JSON response.": [
                            "Las respuesta no es una respuesta JSON v\u00e1lida."]
                    }
                },
                "comment": {
                    "reference": "wp-includes\/js\/dist\/api-fetch.js"
                }
            });
            //# sourceURL=wp-api-fetch-js-translations
        </script>
        <script id="wp-api-fetch-js" src="/wp-includes/js/dist/api-fetch.min95a4.js?ver=6f2a4faeee3c722b1e57"></script>
        <script id="wp-api-fetch-js-after">
            wp.apiFetch.use(wp.apiFetch.createRootURLMiddleware("wp-json/index.html"));
            wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware("0665efc159");
            wp.apiFetch.use(wp.apiFetch.nonceMiddleware);
            wp.apiFetch.use(wp.apiFetch.mediaUploadMiddleware);
            wp.apiFetch.nonceEndpoint = "wp-admin/admin-ajaxf809.html?action=rest-nonce";
            //# sourceURL=wp-api-fetch-js-after
        </script>
        <script id="wp-polyfill-js" src="/wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0"></script>
        <script id="woo-variation-swatches-js-extra">
            var woo_variation_swatches_options = {
                "show_variation_label": "1",
                "clear_on_reselect": "",
                "variation_label_separator": ":",
                "is_mobile": "1",
                "show_variation_stock": "",
                "stock_label_threshold": "5",
                "cart_redirect_after_add": "no",
                "enable_ajax_add_to_cart": "yes",
                "cart_url": "/carrito",
                "is_cart": ""
            };
            //# sourceURL=woo-variation-swatches-js-extra
        </script>
        <script id="woo-variation-swatches-js"
            src="/wp-content/plugins/woo-variation-swatches/assets/js/frontend.min8d5a.js?ver=2.4.0"></script>
        <script id="sourcebuster-js-js"
            src="/wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min5ae7.js?ver=11.0.1"></script>
        <script id="wc-order-attribution-js-extra">
            var wc_order_attribution = {
                "params": {
                    "lifetime": 1.0000000000000000818030539140313095458623138256371021270751953125e-5,
                    "session": 30,
                    "base64": false,
                    "ajaxurl": "/wp-admin/admin-ajax.php",
                    "prefix": "wc_order_attribution_",
                    "allowTracking": true
                },
                "fields": {
                    "source_type": "current.typ",
                    "referrer": "current_add.rf",
                    "utm_campaign": "current.cmp",
                    "utm_source": "current.src",
                    "utm_medium": "current.mdm",
                    "utm_content": "current.cnt",
                    "utm_id": "current.id",
                    "utm_term": "current.trm",
                    "utm_source_platform": "current.plt",
                    "utm_creative_format": "current.fmt",
                    "utm_marketing_tactic": "current.tct",
                    "session_entry": "current_add.ep",
                    "session_start_time": "current_add.fd",
                    "session_pages": "session.pgs",
                    "session_count": "udata.vst",
                    "user_agent": "udata.uag"
                }
            };
            //# sourceURL=wc-order-attribution-js-extra
        </script>
        <script id="wc-order-attribution-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min5ae7.js?ver=11.0.1"></script>
        <script id="zota-script-js-extra">
            var zota_settings = {
                "storage_key": "zota_4e095cb6d91a79471c00b4dd4d1f5332",
                "quantity_minus": "\u003Ci class=\"tb-icon tb-icon-minus\"\u003E\u003C/i\u003E",
                "quantity_plus": "\u003Ci class=\"tb-icon tb-icon-plus\"\u003E\u003C/i\u003E",
                "ajaxurl": "/wp-admin/admin-ajax.php",
                "clear_megamenu_cache": "",
                "cancel": "cancel",
                "show_all_text": "View all",
                "search": "Search",
                "close": "Close",
                "posts": "{\"error\":\"\",\"m\":\"\",\"p\":\"384\",\"post_parent\":\"\",\"subpost\":\"\",\"subpost_id\":\"\",\"attachment\":\"\",\"attachment_id\":0,\"name\":\"\",\"pagename\":\"\",\"page_id\":\"384\",\"second\":\"\",\"minute\":\"\",\"hour\":\"\",\"day\":0,\"monthnum\":0,\"year\":0,\"w\":0,\"category_name\":\"\",\"tag\":\"\",\"cat\":\"\",\"tag_id\":\"\",\"author\":\"\",\"author_name\":\"\",\"feed\":\"\",\"tb\":\"\",\"paged\":0,\"meta_key\":\"\",\"meta_value\":\"\",\"preview\":\"\",\"s\":\"\",\"sentence\":\"\",\"title\":\"\",\"fields\":\"all\",\"menu_order\":\"\",\"embed\":\"\",\"category__in\":[],\"category__not_in\":[],\"category__and\":[],\"post__in\":[],\"post__not_in\":[],\"post_name__in\":[],\"tag__in\":[],\"tag__not_in\":[],\"tag__and\":[],\"tag_slug__in\":[],\"tag_slug__and\":[],\"post_parent__in\":[],\"post_parent__not_in\":[],\"author__in\":[],\"author__not_in\":[],\"search_columns\":[],\"ignore_sticky_posts\":false,\"suppress_filters\":false,\"cache_results\":true,\"update_post_term_cache\":true,\"update_menu_item_cache\":false,\"lazy_load_term_meta\":true,\"update_post_meta_cache\":true,\"post_type\":\"\",\"posts_per_page\":10,\"nopaging\":false,\"comments_per_page\":\"50\",\"no_found_rows\":false,\"order\":\"DESC\"}",
                "max_page": "0",
                "mobile": "1",
                "elements_ready": {
                    "slick": ["brands", "products", "posts-grid", "our-team", "product-category", "product-tabs",
                        "testimonials", "product-categories-tabs", "list-categories-product",
                        "custom-image-list-categories", "custom-image-list-tags", "product-recently-viewed",
                        "product-flash-sales", "product-list-tags", "product-count-down"
                    ],
                    "ajax_tabs": ["product-categories-tabs", "product-tabs"],
                    "countdowntimer": ["product-flash-sales", "product-count-down"],
                    "testimonials": ["testimonials"],
                    "navmenu": ["nav-menu"],
                    "autocomplete": ["search-form"],
                    "customfonts": ["list-custom-fonts"],
                    "sumoselect": ["search-form", "custom-language", "currency"]
                },
                "is_edit": "",
                "combined_css": "",
                "current_page": "1",
                "popup_cart_icon": "\u003Ci class=\"tb-icon tb-icon-cross\"\u003E\u003C/i\u003E",
                "popup_cart_noti": "fue a\u00f1adido al carrito de la compra.",
                "cart_position": "right",
                "ajax_update_quantity": "1",
                "display_mode": "grid",
                "quantity_mode": "",
                "loader": "/wp-content/themes/zota/images/ajax-loader.gif",
                "wp_product_remove_nonce": "2934e13c90",
                "is_checkout": "",
                "ajax_popup_quick": "1",
                "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
                "checkout_url": "/pedido/",
                "i18n_checkout": "Pedido",
                "img_class_container": ".woocommerce-product-gallery__image",
                "thumbnail_gallery_class_element": ".flex-control-nav.flex-control-thumbs li"
            };
            //# sourceURL=zota-script-js-extra
        </script>
        <script id="zota-script-js" src="/wp-content/themes/zota/js/functions.min5152.js?ver=1.0"></script>
        <script id="zota-woocommerce-js" src="/wp-content/themes/zota/js/woocommerce.min5152.js?ver=1.0"></script>
        <script id="elementor-webpack-runtime-js"
            src="/wp-content/plugins/elementor/assets/js/webpack.runtime.min9c92.js?ver=4.2.3"></script>
        <script id="elementor-frontend-modules-js"
            src="/wp-content/plugins/elementor/assets/js/frontend-modules.min9c92.js?ver=4.2.3"></script>
        <script id="jquery-ui-core-js-before">
            jQuery.uiBackCompat = true;
            //# sourceURL=jquery-ui-core-js-before
        </script>
        <script id="jquery-ui-core-js" src="/wp-includes/js/jquery/ui/core.min0a10.js?ver=1.14.2"></script>
        <script id="elementor-frontend-js-before">
            var elementorFrontendConfig = {
                "environmentMode": {
                    "edit": false,
                    "wpPreview": false,
                    "isScriptDebug": false
                },
                "i18n": {
                    "shareOnFacebook": "Compartir en Facebook",
                    "shareOnX": "Compartir en X",
                    "pinIt": "Pinear",
                    "download": "Descargar",
                    "downloadImage": "Descargar imagen",
                    "fullscreen": "Pantalla completa",
                    "zoom": "Zoom",
                    "share": "Compartir",
                    "playVideo": "Reproducir v\u00eddeo",
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "close": "Cerrar",
                    "a11yCarouselPrevSlideMessage": "Diapositiva anterior",
                    "a11yCarouselNextSlideMessage": "Diapositiva siguiente",
                    "a11yCarouselFirstSlideMessage": "Esta es la primera diapositiva",
                    "a11yCarouselLastSlideMessage": "Esta es la \u00faltima diapositiva",
                    "a11yCarouselPaginationBulletMessage": "Ir a la diapositiva"
                },
                "is_rtl": false,
                "breakpoints": {
                    "xs": 0,
                    "sm": 480,
                    "md": 768,
                    "lg": 1025,
                    "xl": 1440,
                    "xxl": 1600
                },
                "responsive": {
                    "breakpoints": {
                        "mobile": {
                            "label": "M\u00f3vil vertical",
                            "value": 767,
                            "default_value": 767,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "mobile_extra": {
                            "label": "M\u00f3vil horizontal",
                            "value": 880,
                            "default_value": 880,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "tablet": {
                            "label": "Tableta vertical",
                            "value": 1024,
                            "default_value": 1024,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "tablet_extra": {
                            "label": "Tableta horizontal",
                            "value": 1200,
                            "default_value": 1200,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "laptop": {
                            "label": "Port\u00e1til",
                            "value": 1366,
                            "default_value": 1366,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "widescreen": {
                            "label": "Pantalla grande",
                            "value": 2400,
                            "default_value": 2400,
                            "direction": "min",
                            "is_enabled": false
                        }
                    },
                    "hasCustomBreakpoints": false
                },
                "version": "4.2.3",
                "is_static": false,
                "experimentalFeatures": {
                    "e_font_icon_svg": true,
                    "additional_custom_breakpoints": true,
                    "container": true,
                    "e_panel_promotions": true,
                    "nested-elements": true,
                    "global_classes_should_enforce_capabilities": true,
                    "e_variables": true,
                    "e_opt_in_v4_page": true,
                    "e_components": true,
                    "e_interactions": true,
                    "e_widget_creation": true,
                    "import-export-customization": true
                },
                "urls": {
                    "assets": "\/wp-content\/plugins\/elementor\/assets\/",
                    "ajaxurl": "\/wp-admin\/admin-ajax.php",
                    "uploadUrl": "\/wp-content\/uploads"
                },
                "nonces": {
                    "floatingButtonsClickTracking": "1be5a71635",
                    "atomicFormsSendForm": "f7bdde9d14"
                },
                "swiperClass": "swiper",
                "settings": {
                    "page": [],
                    "editorPreferences": []
                },
                "kit": {
                    "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                    "global_image_lightbox": "yes",
                    "lightbox_enable_counter": "yes",
                    "lightbox_enable_fullscreen": "yes",
                    "lightbox_enable_zoom": "yes",
                    "lightbox_enable_share": "yes",
                    "lightbox_title_src": "title",
                    "lightbox_description_src": "description"
                },
                "post": {
                    "id": 384,
                    "title": "Inicio%20-%20Remolques%20Titos",
                    "excerpt": "",
                    "featuredImage": false
                }
            };
            //# sourceURL=elementor-frontend-js-before
        </script>
        <script id="elementor-frontend-js" src="/wp-content/plugins/elementor/assets/js/frontend.min9c92.js?ver=4.2.3"></script>
        <script id="slick-js" src="/wp-content/themes/zota/js/slick.min8a54.js?ver=1.0.0"></script>
        <script id="zota-custom-slick-js" src="/wp-content/themes/zota/js/custom-slick.min5152.js?ver=1.0"></script>
        <script id="mc4wp-forms-api-js" defer src="/wp-content/plugins/mailchimp-for-wp/assets/js/forms1315.js?ver=4.14.0">
        </script>




        <script id="zota-skip-link-fix-js" src="/wp-content/themes/zota/js/skip-link-fix.min5152.js?ver=1.0"></script>
        <script id="popper-js" src="/wp-content/themes/zota/js/popper.mind57f.js?ver=1.12.9"></script>
        <script id="bootstrap-js" src="/wp-content/themes/zota/js/bootstrap.mincce7.js?ver=4.0.0"></script>
        <script id="waypoints-js" src="/wp-content/themes/zota/js/jquery.waypoints.mincce7.js?ver=4.0.0"></script>
        <script id="jquery-autocomplete-js" src="/wp-content/themes/zota/js/jquery.autocomplete.min8a54.js?ver=1.0.0"></script>
        <script id="jquery-countdowntimer-js" src="/wp-content/themes/zota/js/jquery.countdowntimer.minf945.js?ver=20150315">
        </script>
        <script id="detectmobilebrowser-js" src="/wp-content/themes/zota/js/detectmobilebrowser.min0ba6.js?ver=1.0.6"></script>
        <script id="jquery-fastclick-js" src="/wp-content/themes/zota/js/jquery.fastclick.min0ba6.js?ver=1.0.6"></script>
        <script id="ion.range-slider-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/ion.range-slider/js/ion.rangeSlider.min8b46.js?ver=3.3.4.5">
        </script>
        <script id="woof_tooltip-js-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/tooltip/js/tooltipster.bundle.min8b46.js?ver=3.3.4.5">
        </script>
        <script id="icheck-jquery-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/icheck/icheck.min8b46.js?ver=3.3.4.5"></script>
        <script id="woof_front-js-extra">
            var woof_filter_titles = {
                "by_price": "by_price",
                "by_instock": "by_instock",
                "by_text": "by_text",
                "product_cat": "Categor\u00edas"
            };
            var woof_ext_filter_titles = {
                "woof_author": "Por autor",
                "backorder": "Exclude On backorder",
                "featured": "Featured products",
                "stock": "En stock",
                "onsales": "En oferta",
                "byrating": "By rating",
                "woof_sku": "by SKU",
                "woof_text": "Por texto"
            };
            //# sourceURL=woof_front-js-extra
        </script>
        <script id="woof_front-js-before">
            var woof_is_permalink = 1;
            var woof_shop_page = "";
            var woof_m_b_container = ".woocommerce-products-header";
            var woof_really_curr_tax = {};
            var woof_current_page_link = location.protocol + '//' + location.host + location.pathname;
            /*lets remove pagination from woof_current_page_link*/
            woof_current_page_link = woof_current_page_link.replace(/\page\/[0-9]+/, "");
            woof_current_page_link = "tienda/index.html";
            var woof_link = '/wp-content/plugins/woocommerce-products-filter/index.html';

            var woof_ajaxurl = "wp-admin/admin-ajax.html";

            var woof_lang = {
                'orderby': "orderby",
                'date': "fecha",
                'perpage': "por página",
                'pricerange': "rango de precios",
                'menu_order': "orden del menú",
                'popularity': "popularidad",
                'rating': "clasificación",
                'price': "precio bajo a alto",
                'price-desc': "precio alto a bajo",
                'clear_all': "Vaciar todo",
                'list_opener': "Сhild list opener",
            };

            if (typeof woof_lang_custom == 'undefined') {
                var woof_lang_custom = {}; /*!!important*/
            }

            var woof_is_mobile = 0;
            woof_is_mobile = 1;



            var woof_show_price_search_button = 0;
            var woof_show_price_search_type = 0;

            var woof_show_price_search_type = 1;
            var swoof_search_slug = "swoof";


            var icheck_skin = {};
            icheck_skin.skin = "square";
            icheck_skin.color = "blue";

            var woof_select_type = 'chosen';


            var woof_current_values = '[]';
            var woof_lang_loading = "Cargando ...";


            var woof_lang_show_products_filter = "mostrar los filtros del producto";
            var woof_lang_hide_products_filter = "ocultar los filtros del producto";
            var woof_lang_pricerange = "rango de precios";

            var woof_use_beauty_scroll = 1;

            var woof_autosubmit = 1;
            var woof_ajaxurl = "wp-admin/admin-ajax.html";
            /*var woof_submit_link = "";*/
            var woof_is_ajax = 0;
            var woof_ajax_redraw = 0;
            var woof_ajax_page_num = 1;
            var woof_ajax_first_done = false;
            var woof_checkboxes_slide_flag = 1;


            /*toggles*/
            var woof_toggle_type = "text";

            var woof_toggle_closed_text = "+";
            var woof_toggle_opened_text = "-";

            var woof_toggle_closed_image = "/wp-content/plugins/woocommerce-products-filter/img/plus.svg";
            var woof_toggle_opened_image = "/wp-content/plugins/woocommerce-products-filter/img/minus.svg";


            /*indexes which can be displayed in red buttons panel*/
            var woof_accept_array = ["min_price", "orderby", "perpage", "woof_author", "backorder", "featured", "stock",
                "onsales", "byrating", "woof_sku", "woof_text", "min_rating", "product_brand", "product_visibility",
                "product_cat", "product_tag", "pos_product_visibility", "pa_color", "pa_image", "pa_size"
            ];


            /*for extensions*/

            var woof_ext_init_functions = null;
            woof_ext_init_functions =
                '{"by_author":"woof_init_author","by_backorder":"woof_init_onbackorder","by_featured":"woof_init_featured","by_instock":"woof_init_instock","by_onsales":"woof_init_onsales","by_sku":"woof_init_sku","by_text":"woof_init_text","color":"woof_init_colors","image":"woof_init_image","label":"woof_init_labels","select_hierarchy":"woof_init_select_hierarchy","select_radio_check":"woof_init_select_radio_check","slider":"woof_init_sliders"}';



            var woof_overlay_skin = "default";

            ;
            var woof_front_sd_is_a = 1;
            var woof_front_show_notes = 0;
            var woof_lang_front_builder_del = "Are you sure you want to delete this filter-section?";
            var woof_lang_front_builder_options = "Opciones";
            var woof_lang_front_builder_option = "Option";
            var woof_lang_front_builder_section_options = "Section Options";
            var woof_lang_front_builder_description = "Description";
            var woof_lang_front_builder_close = "Close";
            var woof_lang_front_builder_suggest = "Suggest the feature";
            var woof_lang_front_builder_good_to_use = "good to use in content areas";
            var woof_lang_front_builder_confirm_sd =
                "Smart Designer item will be created and attached to this filter section and will cancel current type, proceed?";
            var woof_lang_front_builder_creating = "Creando";
            var woof_lang_front_builder_shortcode = "Shortcode";
            var woof_lang_front_builder_layout = "Layout";
            var woof_lang_front_builder_filter_section = "Section options";
            var woof_lang_front_builder_filter_redrawing = "filter redrawing";
            var woof_lang_front_builder_filter_redrawn = "redrawn";
            var woof_lang_front_builder_filter_redrawn = "redrawn";
            var woof_lang_front_builder_title_top_info = "this functionality is only visible for the site administrator";
            var woof_lang_front_builder_title_top_info_demo = "demo mode is activated, and results are visible only to you";;
            var woof_lang_front_builder_select = "+ Add filter section";;

            function woof_js_after_ajax_done() {
                jQuery(document).trigger('woof_ajax_done');
            }
            //# sourceURL=woof_front-js-before
        </script>
        <script id="woof_front-js" src="/wp-content/plugins/woocommerce-products-filter/js/front8b46.js?ver=3.3.4.5"></script>
        <script id="woof_radio_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/html_types/radio8b46.js?ver=3.3.4.5"></script>
        <script id="woof_checkbox_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/html_types/checkbox8b46.js?ver=3.3.4.5"></script>
        <script id="woof_select_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/html_types/select8b46.js?ver=3.3.4.5"></script>
        <script id="woof_mselect_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/html_types/mselect8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_author_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_author/js/by_author8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_backorder_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_backorder/js/by_backorder8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_featured_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_featured/js/by_featured8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_instock_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_instock/js/by_instock8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_onsales_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_onsales/js/by_onsales8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_sku_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_sku/js/by_sku8b46.js?ver=3.3.4.5"></script>
        <script id="woof_by_text_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/by_text/assets/js/front8b46.js?ver=3.3.4.5"></script>
        <script id="woof_color_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/color/js/html_types/color8b46.js?ver=3.3.4.5"></script>
        <script id="woof_image_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/image/js/html_types/image8b46.js?ver=3.3.4.5"></script>
        <script id="woof_label_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/label/js/html_types/label8b46.js?ver=3.3.4.5"></script>
        <script id="woof_sections_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/sections/js/sections8b46.js?ver=3.3.4.5"></script>
        <script id="woof_select_hierarchy_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/select_hierarchy/js/html_types/select_hierarchy8b46.js?ver=3.3.4.5">
        </script>
        <script id="woof_select_radio_check_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/select_radio_check/js/html_types/select_radio_check8b46.js?ver=3.3.4.5">
        </script>
        <script id="woof_slider_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/slider/js/html_types/slider8b46.js?ver=3.3.4.5"></script>
        <script id="woof_sd_html_items-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/smart_designer/js/front8b46.js?ver=3.3.4.5"></script>
        <script id="chosen-drop-down-js"
            src="/wp-content/plugins/woocommerce-products-filter/js/chosen/chosen.jquery8b46.js?ver=3.3.4.5"></script>
        <script id="jquery-ui-mouse-js" src="/wp-includes/js/jquery/ui/mouse.min0a10.js?ver=1.14.2"></script>
        <script id="jquery-ui-slider-js" src="/wp-includes/js/jquery/ui/slider.min0a10.js?ver=1.14.2"></script>
        <script id="wc-jquery-ui-touchpunch-js"
            src="/wp-content/plugins/woocommerce/assets/js/jquery-ui-touch-punch/jquery-ui-touch-punch.min5ae7.js?ver=11.0.1">
        </script>
        <script id="wc-accounting-js"
            src="/wp-content/plugins/woocommerce/assets/js/accounting/accounting.minaffb.js?ver=0.4.2"></script>
        <script id="wc-price-slider-js-extra">
            var woocommerce_price_slider_params = {
                "currency_format_num_decimals": "0",
                "currency_format_symbol": "\u20ac",
                "currency_format_decimal_sep": ".",
                "currency_format_thousand_sep": ",",
                "currency_format": "%v%s"
            };
            //# sourceURL=wc-price-slider-js-extra
        </script>
        <script id="wc-price-slider-js"
            src="/wp-content/plugins/woocommerce/assets/js/frontend/price-slider.min5ae7.js?ver=11.0.1"></script>
        <script id="jquery-mmenu-js" src="/wp-content/themes/zota/js/jquery.mmenu.minfd3b.js?ver=7.0.5"></script>
        <script id="jquery-treeview-js" src="/wp-content/themes/zota/js/jquery.treeview.min2fca.js?ver=1.4.0"></script>
        <script id="jquery-sumoselect-js" src="/wp-content/themes/zota/js/jquery.sumoselect.min5b75.js?ver=3.0.2"></script>
        <script id="woof-slideout-js-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/slideout/js/jquery.tabSlideOut8b46.js?ver=3.3.4.5">
        </script>
        <script id="woof-slideout-init-js"
            src="/wp-content/plugins/woocommerce-products-filter/ext/slideout/js/slideout8b46.js?ver=3.3.4.5"></script>


        <script id="rs-initialisation-scripts">
            var tpj = jQuery;

            var revapi1;

            if (window.RS_MODULES === undefined) window.RS_MODULES = {};
            if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
            RS_MODULES.modules["revslider11"] = {
                once: RS_MODULES.modules["revslider11"] !== undefined ? RS_MODULES.modules["revslider11"].once : undefined,
                init: function() {
                    window.revapi1 = window.revapi1 === undefined || window.revapi1 === null || window.revapi1
                        .length === 0 ? document.getElementById("rev_slider_1_1") : window.revapi1;
                    if (window.revapi1 === null || window.revapi1 === undefined || window.revapi1.length == 0) {
                        window.revapi1initTry = window.revapi1initTry === undefined ? 0 : window.revapi1initTry + 1;
                        if (window.revapi1initTry < 20) requestAnimationFrame(function() {
                            RS_MODULES.modules["revslider11"].init()
                        });
                        return;
                    }
                    window.revapi1 = jQuery(window.revapi1);
                    if (window.revapi1.revolution == undefined) {
                        revslider_showDoubleJqueryError("rev_slider_1_1");
                        return;
                    }
                    revapi1.revolutionInit({
                        revapi: "revapi1",
                        DPR: "dpr",
                        visibilityLevels: "1240,1024,778,480",
                        gridwidth: "1230,1024,778,480",
                        gridheight: "460,460,460,460",
                        lazyType: "smart",
                        perspective: 600,
                        perspectiveType: "global",
                        editorheight: "460,460,460,460",
                        responsiveLevels: "1240,1024,778,480",
                        progressBar: {
                            disableProgressBar: true
                        },
                        navigation: {
                            wheelCallDelay: 1000,
                            onHoverStop: false,
                            bullets: {
                                enable: true,
                                tmp: "",
                                style: "tbay-bullets",
                                v_offset: 24,
                                space: 8
                            }
                        },
                        viewPort: {
                            global: true,
                            globalDist: "-200px",
                            enable: false
                        },
                        fallbacks: {
                            allowHTML5AutoPlayOnAndroid: true
                        },
                    });

                }
            } // End of RevInitScript

            if (window.RS_MODULES.checkMinimal !== undefined) {
                window.RS_MODULES.checkMinimal();
            };
        </script>
        <div id="tbay-cart-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-body-content"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class='xlwcty_header_passed' style='display: none;'></div>
    @endverbatim

    <a class="tr-wa" href="https://wa.me/34683573516?text=Hola,%20me%20gustar%C3%ADa%20recibir%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20remolques." target="_blank" rel="noopener" aria-label="Chatea por WhatsApp" title="Chatea por WhatsApp">
        <span class="tr-wa-pulse" aria-hidden="true"></span>
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.001 3.2c-7.06 0-12.8 5.74-12.8 12.8 0 2.256.59 4.46 1.712 6.4L3.2 28.8l6.56-1.712A12.74 12.74 0 0 0 16 28.8c7.06 0 12.8-5.74 12.8-12.8S23.06 3.2 16.001 3.2Zm0 23.04a10.2 10.2 0 0 1-5.2-1.424l-.373-.222-3.89 1.016 1.04-3.79-.243-.389A10.19 10.19 0 0 1 5.76 16c0-5.65 4.59-10.24 10.24-10.24S26.24 10.35 26.24 16 21.65 26.24 16 26.24Zm5.616-7.66c-.307-.154-1.816-.896-2.097-.998-.28-.103-.485-.154-.69.154-.204.307-.79.998-.968 1.203-.179.205-.357.23-.664.077-.307-.154-1.297-.478-2.47-1.524-.913-.814-1.53-1.82-1.71-2.127-.178-.307-.019-.473.135-.626.139-.138.307-.358.46-.537.154-.18.205-.307.307-.512.103-.205.051-.384-.026-.538-.076-.154-.69-1.665-.945-2.28-.25-.598-.503-.517-.69-.527l-.588-.01c-.204 0-.537.077-.818.384-.28.307-1.073 1.049-1.073 2.56 0 1.51 1.099 2.969 1.252 3.174.153.205 2.163 3.302 5.24 4.63.732.316 1.303.505 1.748.646.735.234 1.404.201 1.933.122.59-.088 1.816-.742 2.072-1.459.256-.717.256-1.331.179-1.459-.076-.128-.28-.205-.588-.359Z"/></svg>
    </a>

    <div class="tr-qv-overlay" id="tbay-quickview-modal" role="dialog" aria-modal="true" hidden>
        <div class="tr-qv-dialog" role="document">
            <button type="button" class="tr-qv-close" data-dismiss="modal" aria-label="Cerrar">&times;</button>
            <div class="modal-body tr-qv-body"><div class="qv-loading">Cargando&hellip;</div></div>
        </div>
    </div>

    @php($asset = fn ($p) => $p.'?v='.(@filemtime(public_path($p)) ?: date('Ymd')))
    <script src="/{{ $asset('assets/js/app.js') }}"></script>
    <script src="/{{ $asset('assets/js/shop-bridge.js') }}"></script>
    <script src="/{{ $asset('assets/js/nav-active.js') }}"></script>
    @stack('scripts')
    @verbatim
    </body>


    </html>

    <!-- Page supported by LiteSpeed Cache 7.9 on 2026-08-30 15:09:23 -->
@endverbatim
