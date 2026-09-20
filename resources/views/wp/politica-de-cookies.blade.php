@extends('layouts.wp')

@section('body_class', 'page page-template-default wp-singular')

@section('breadcrumb')
@include('partials.page-heading', ['title' => 'Política de cookies'])
@endsection

@section('content')
<div class="entry-content page-content legal-content">

<p class="wp-block-paragraph">Última actualización: septiembre de 2026.</p>
<h2 class="wp-block-heading">¿Qué son las cookies?</h2>
<p class="wp-block-paragraph">Las cookies son pequeños archivos que un sitio web guarda en su dispositivo para recordar información sobre su visita.</p>
<h2 class="wp-block-heading">Cookies que utiliza este sitio</h2>
<p class="wp-block-paragraph">REMOLQUES TITOS S.L. utiliza únicamente cookies técnicas y de sesión, necesarias para el funcionamiento de la tienda: mantener el carrito de la compra, la sesión de usuario y la protección de los formularios (CSRF). Además, el navegador guarda localmente (localStorage) su lista de favoritos. Estas cookies están exentas de consentimiento según el artículo 22.2 de la Ley 34/2002 (LSSI).</p>
<p class="wp-block-paragraph">Este sitio no utiliza cookies analíticas, publicitarias ni de terceros. Si en el futuro se incorporan, se actualizará esta política y se solicitará su consentimiento previo.</p>
<h2 class="wp-block-heading">Cómo desactivar las cookies</h2>
<p class="wp-block-paragraph">Puede bloquear o eliminar las cookies desde la configuración de su navegador (Chrome, Firefox, Safari, Edge). Si lo hace, el carrito y el proceso de compra podrían no funcionar correctamente.</p>
<h2 class="wp-block-heading">Contacto</h2>
<p class="wp-block-paragraph">Para cualquier duda: <a href="mailto:contacto@remolquestitos.com">contacto@remolquestitos.com</a> · <a href="tel:+34683573516">+34 683 57 35 16</a>.</p>

@include('partials.legal-company-info')
</div>
@endsection
