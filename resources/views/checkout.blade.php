@extends('layouts.wp')

@section('title', 'Finalizar compra — Remolques Titos')

@section('content')
<div class="lv-scope container" style="padding:24px 0 48px">
    <h1>Finalizar compra</h1>

    <form action="{{ route('checkout.store') }}" method="post" class="layout" style="grid-template-columns:1fr 340px">
        @csrf
        <div class="panel">
            <h3 style="margin-top:0">Datos de envío</h3>
            <div class="form-grid">
                <div class="field">
                    <label>Nombre completo *</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
                    @error('customer_name')<span class="err">{{ $message }}</span>@enderror
                </div>
                <div class="field">
                    <label>Email *</label>
                    <input type="email" name="customer_email" value="{{ old('customer_email') }}" required>
                    @error('customer_email')<span class="err">{{ $message }}</span>@enderror
                </div>
                <div class="field">
                    <label>Teléfono</label>
                    <input type="text" name="customer_phone" value="{{ old('customer_phone') }}">
                </div>
                <div class="field">
                    <label>Provincia</label>
                    <input type="text" name="province" value="{{ old('province') }}">
                </div>
                <div class="field field--full">
                    <label>Dirección *</label>
                    <input type="text" name="address" value="{{ old('address') }}" required>
                    @error('address')<span class="err">{{ $message }}</span>@enderror
                </div>
                <div class="field">
                    <label>Ciudad *</label>
                    <input type="text" name="city" value="{{ old('city') }}" required>
                    @error('city')<span class="err">{{ $message }}</span>@enderror
                </div>
                <div class="field">
                    <label>Código postal *</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                    @error('postal_code')<span class="err">{{ $message }}</span>@enderror
                </div>
                <div class="field field--full">
                    <label>Notas del pedido</label>
                    <textarea name="notes" rows="3">{{ old('notes') }}</textarea>
                </div>
            </div>

            <h3>Método de pago</h3>
            <div class="field">
                <label><input type="radio" name="payment_method" value="cod" checked> Contra reembolso (pago a la entrega)</label>
                <label><input type="radio" name="payment_method" value="transfer" @checked(old('payment_method')==='transfer')> Transferencia bancaria</label>
                @error('payment_method')<span class="err">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="summary">
            <h3 style="margin-top:0">Tu pedido</h3>
            <table style="width:100%;font-size:.88rem">
                @foreach ($items as $line)
                    <tr>
                        <td>{{ $line['name'] }} × {{ $line['qty'] }}</td>
                        <td style="text-align:right;white-space:nowrap">{{ number_format($line['line_total'], 2, ',', '.') }} €</td>
                    </tr>
                @endforeach
            </table>
            <div class="summary__line"><span>Subtotal</span><span>{{ number_format($cart->subtotal(), 2, ',', '.') }} €</span></div>
            <div class="summary__line"><span>Envío</span><span>{{ $cart->shipping() == 0 ? 'Gratis' : number_format($cart->shipping(), 2, ',', '.').' €' }}</span></div>
            <div class="summary__total"><span>Total</span><span>{{ number_format($cart->total(), 2, ',', '.') }} €</span></div>
            <button class="btn btn--block btn--lg mt-2" type="submit">Realizar pedido</button>
            <p class="muted" style="font-size:.78rem;margin-top:.6rem">Al realizar el pedido recibirás un email de confirmación.</p>
        </div>
    </form>
</div>

<style>
/* Finalizar compra — responsive */
@media (max-width: 900px){
    .lv-scope .layout{display:block !important}
    .lv-scope .layout > *{width:auto !important}
    .lv-scope .form-grid{grid-template-columns:1fr !important}
    .lv-scope .summary{position:static !important;margin-top:20px}
}
@media (max-width: 560px){
    .lv-scope .panel{padding:16px}
    .lv-scope .field--full,.lv-scope .field{grid-column:auto}
}
</style>
@endsection
