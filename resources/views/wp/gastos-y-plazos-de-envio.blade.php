@extends('layouts.wp')

@section('body_class', 'page page-template-default wp-singular')

@section('meta_title', 'Gastos y plazos de envío | Envío gratis a toda España - Remolques Titos')
@section('meta_description', 'Envío gratis a toda España. Preparación en 1–2 días laborables y entrega en 2–5 días laborables mediante ASM, GLS o Correos Express. Consulta plazos, zonas y seguimiento.')
@section('canonical', url('/pagina/gastos-y-plazos-de-envio'))

@section('breadcrumb')
@include('partials.page-heading', ['title' => 'Gastos y plazos de envío'])
@endsection

@section('content')
<div class="entry-content page-content legal-content">

    <p class="wp-block-paragraph"><strong>Envío gratis a toda España.</strong> Los gastos de envío están incluidos en el precio de todos los productos: no se añade ningún coste adicional en el proceso de compra. El precio mostrado es el precio final con IVA incluido.</p>

    <h2 class="wp-block-heading">Plazos de entrega</h2>
    <table class="wp-block-table" style="width:100%;border-collapse:collapse">
        <thead>
            <tr>
                <th style="text-align:left;border-bottom:1px solid #d7e4da;padding:8px">Fase</th>
                <th style="text-align:left;border-bottom:1px solid #d7e4da;padding:8px">Plazo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:8px;border-bottom:1px solid #eef4ef">Preparación del pedido</td>
                <td style="padding:8px;border-bottom:1px solid #eef4ef">1–2 días laborables</td>
            </tr>
            <tr>
                <td style="padding:8px;border-bottom:1px solid #eef4ef">Transporte</td>
                <td style="padding:8px;border-bottom:1px solid #eef4ef">2–5 días laborables</td>
            </tr>
            <tr>
                <td style="padding:8px"><strong>Plazo total estimado</strong></td>
                <td style="padding:8px"><strong>3–7 días laborables</strong></td>
            </tr>
        </tbody>
    </table>

    <p class="wp-block-paragraph">Los plazos indicados son estimaciones a partir de la confirmación del pago y pueden variar en periodos de alta demanda o por incidencias del transportista. Recibirás un número de seguimiento por correo electrónico cuando tu pedido salga de nuestras instalaciones.</p>

    <h2 class="wp-block-heading">Zonas de envío y transportistas</h2>
    <p class="wp-block-paragraph">Realizamos envíos a toda España peninsular. Trabajamos con las agencias ASM, GLS y Correos Express, seleccionando la más adecuada según la zona geográfica y las características del envío. Para envíos a Islas Baleares, Islas Canarias, Ceuta y Melilla, contacta previamente con nosotros en <a href="mailto:contacto@remolquestitos.com">contacto@remolquestitos.com</a> para confirmar disponibilidad y plazos.</p>

    <h2 class="wp-block-heading">Seguimiento y recepción</h2>
    <p class="wp-block-paragraph">En el momento de la entrega, comprueba que el embalaje esté en buen estado. Si detectas daños, indícalo en el albarán del transportista y avísanos en un plazo máximo de 24 horas en <a href="mailto:contacto@remolquestitos.com">contacto@remolquestitos.com</a> adjuntando tu número de pedido y fotografías.</p>

    <p class="wp-block-paragraph">Para más información sobre cambios y reembolsos, consulta la <a href="/pagina/politica-de-devoluciones-y-reembolsos">Política de devoluciones y reembolsos</a>.</p>

    @include('partials.legal-company-info')
</div>
@endsection
