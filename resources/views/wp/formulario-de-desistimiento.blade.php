@extends('layouts.wp')

@section('body_class', 'page page-template-default wp-singular')

@section('breadcrumb')
@include('partials.page-heading', ['title' => 'Formulario de desistimiento'])
@endsection

@section('content')
<div class="entry-content page-content legal-content">

<p class="wp-block-paragraph">Tiene derecho a desistir de su compra en un plazo de 14 días naturales desde la recepción del producto, sin necesidad de justificación (Real Decreto Legislativo 1/2007). Consulte la <a href="/pagina/politica-de-devoluciones-y-reembolsos">política de devoluciones y reembolsos</a>.</p>
<p class="wp-block-paragraph">Para ejercer este derecho, envíe un correo a <a href="mailto:contacto@remolquestitos.com">contacto@remolquestitos.com</a> o una carta a REMOLQUES TITOS S.L., Avenida Los Emigrantes, s/n, 18560 Guadahortuna (Granada), con el texto siguiente (o cualquier declaración inequívoca):</p>
<blockquote class="wp-block-quote"><p>
A la atención de REMOLQUES TITOS S.L. (CIF B18392092), Avenida Los Emigrantes, s/n, 18560 Guadahortuna (Granada):<br>
Por la presente comunico que desisto de mi contrato de compra del siguiente producto: ______________________<br>
Pedido n.º: ____________ · Pedido el / recibido el: ____________<br>
Nombre del consumidor: ____________________<br>
Domicilio del consumidor: ____________________<br>
Fecha: ____________ · Firma (solo si se presenta en papel): ____________</p></blockquote>
<p class="wp-block-paragraph">Recibirá el reembolso en un máximo de 14 días desde que comunique su decisión, conforme a la política de reembolsos. Los gastos de devolución y las condiciones aplicables constan en dicha política.</p>

@include('partials.legal-company-info')
</div>
@endsection
