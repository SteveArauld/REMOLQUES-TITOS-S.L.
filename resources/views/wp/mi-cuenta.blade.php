@extends('layouts.wp')

@section('content')
<div class="woocommerce">
	<div class="woocommerce-notices-wrapper">
		@if (session('status'))
			<div class="woocommerce-message" role="alert">{{ session('status') }}</div>
		@endif
		@foreach ($errors->all() as $error)
			<ul class="woocommerce-error" role="alert"><li>{{ $error }}</li></ul>
		@endforeach
	</div>

@auth
	<div class="woocommerce-MyAccount-content">
		<p class="woocommerce-MyAccount-message">
			Hola <strong>{{ auth()->user()->name }}</strong>
			(¿no eres {{ auth()->user()->name }}?
			<form method="post" action="{{ route('account.logout') }}" style="display:inline">@csrf
				<button type="submit" class="woocommerce-button button" style="padding:0;border:0;background:none;color:inherit;text-decoration:underline;cursor:pointer">Salir</button>
			</form>)
		</p>

		<h2>Pedidos</h2>
		@if ($orders->isEmpty())
			<p class="woocommerce-info">Todavía no has realizado ningún pedido.
				<a class="button" href="{{ route('shop') }}">Ir a la tienda</a></p>
		@else
			<table class="woocommerce-orders-table shop_table shop_table_responsive">
				<thead>
					<tr>
						<th><span class="nobr">Pedido</span></th>
						<th><span class="nobr">Fecha</span></th>
						<th><span class="nobr">Estado</span></th>
						<th><span class="nobr">Total</span></th>
						<th><span class="nobr">Acciones</span></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $order)
						<tr class="woocommerce-orders-table__row order">
							<td data-title="Pedido">#{{ $order->order_number }}</td>
							<td data-title="Fecha">{{ $order->created_at->format('d/m/Y') }}</td>
							<td data-title="Estado">{{ ucfirst($order->status) }}</td>
							<td data-title="Total">{{ number_format($order->total, 2, ',', '.') }} €
								({{ $order->items->sum('quantity') }} artículos)</td>
							<td data-title="Acciones">
								<a href="{{ route('tracking.form') }}" class="woocommerce-button button view">Seguir</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
@endauth

@guest
	<div class="u-columns col2-set" id="customer_login">

		<div class="u-column1 col-1">
			<h2>Acceder</h2>

			<form class="woocommerce-form woocommerce-form-login login" method="post" action="{{ route('account.handle') }}" novalidate>
				@csrf
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username">Nombre de usuario o correo electrónico&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="{{ old('username') }}" required />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password">Contraseña&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required />
				</p>
				<p class="form-row">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Recuérdame</span>
					</label>
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Acceso">Acceso</button>
				</p>
				<p class="woocommerce-LostPassword lost_password">
					<a href="{{ route('contact') }}">¿Olvidaste la contraseña?</a>
				</p>
			</form>
		</div>

		<div class="u-column2 col-2">
			<h2>Registrarse</h2>

			<form method="post" action="{{ route('account.handle') }}" class="woocommerce-form woocommerce-form-register register">
				@csrf
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_name">Nombre&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="reg_name" value="{{ old('name') }}" required />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email">Dirección de correo electrónico&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="{{ old('email') }}" required />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password">Contraseña&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required />
				</p>
				<div class="woocommerce-privacy-policy-text"><p>Sus datos personales se utilizarán para gestionar el acceso a su cuenta y para otros fines descritos en nuestra
					<a href="{{ route('page', 'politica-privacidad') }}" class="woocommerce-privacy-policy-link" target="_blank">política de privacidad</a>.</p></div>
				<p class="woocommerce-form-row form-row">
					<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Registrarse">Registrarse</button>
				</p>
			</form>
		</div>

	</div>
@endguest

</div>
@endsection
