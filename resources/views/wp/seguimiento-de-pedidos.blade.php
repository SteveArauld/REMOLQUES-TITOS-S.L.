@extends('layouts.wp')

@section('elementor_css')
<link rel='stylesheet' id='elementor-post-397-css' href='/wp-content/uploads/elementor/css/post-397.css' media='all' />
@endsection

@section('content')
@verbatim

						<div data-elementor-type="wp-page" data-elementor-id="397" class="elementor elementor-397">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-b589f94 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b589f94" data-element_type="section" data-e-type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c3fc00d" data-id="c3fc00d" data-element_type="column" data-e-type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-5b9647c elementor-widget elementor-widget-tbay-heading" data-id="5b9647c" data-element_type="widget" data-e-type="widget" data-widget_type="tbay-heading.default">
				<div class="elementor-widget-container">
					
<div class="tbay-element tbay-element-heading">
				<h3 class="heading-tbay-title">
									<span class="title">Seguimiento de pedidos</span>
					    	
							</h3>
		</div>				</div>
				</div>
				<div class="elementor-element elementor-element-15c65cc elementor-widget elementor-widget-shortcode" data-id="15c65cc" data-element_type="widget" data-e-type="widget" data-widget_type="shortcode.default">
				<div class="elementor-widget-container">
							<div class="elementor-shortcode"><div class="woocommerce">
<form action="/seguimiento-de-pedidos" method="post" class="woocommerce-form woocommerce-form-track-order track_order">
@endverbatim
@csrf
@verbatim


	
	<p>Para hacer seguimiento de tu pedido, por favor introduce el ID de tu pedido en el cuadro de abajo y pulsa el botón «Seguir». Esto se envió en tu recibo y en el correo electrónico de confirmación que deberías haber recibido.</p>

	<p class="form-row form-row-first"><label for="orderid">ID de pedido</label> <input class="input-text" type="text" name="orderid" id="orderid" value="" placeholder="Se encuentra en tu correo electrónico de confirmación de pedido." /></p>	<p class="form-row form-row-last"><label for="order_email">Correo electrónico de facturación</label> <input class="input-text" type="text" name="order_email" id="order_email" value="" placeholder="El correo electrónico que utilizaste durante el pago." /></p>	<div class="clear"></div>

	
	<p class="form-row"><button type="submit" class="button" name="track" value="Seguir">Seguir</button></p>
	<input type="hidden" id="woocommerce-order-tracking-nonce" name="woocommerce-order-tracking-nonce" value="631d8ef1d4" /><input type="hidden" name="_wp_http_referer" value="/seguimiento-de-pedidos/" />
	
</form>
</div></div>
						</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
					
@endverbatim
@endsection
