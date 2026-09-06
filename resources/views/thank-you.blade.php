@extends('layouts.wp')

@section('title', 'Pedido confirmado — Remolques Titos')

@section('content')
<div class="lv-scope container" style="padding:24px 0 48px">
    <div class="panel text-center" style="max-width:640px;margin:2rem auto">
        <div style="font-size:3rem">✅</div>
        <h1>¡Gracias por tu pedido!</h1>
        <p>Tu número de pedido es <strong>{{ $order->order_number }}</strong>.</p>
        <p class="muted">Hemos enviado la confirmación a <strong>{{ $order->customer_email }}</strong>.
           Puedes consultar el estado en cualquier momento desde
           <a href="{{ route('tracking.form') }}">Seguimiento de pedidos</a>.</p>
    </div>

    <div class="layout" style="grid-template-columns:1fr 320px">
        <table class="table">
            <thead><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr></thead>
            <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2, ',', '.') }} €</td>
                    <td>{{ number_format($item->line_total, 2, ',', '.') }} €</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="summary">
            <div class="summary__line"><span>Subtotal</span><span>{{ number_format($order->subtotal, 2, ',', '.') }} €</span></div>
            <div class="summary__line"><span>Envío</span><span>{{ $order->shipping == 0 ? 'Gratis' : number_format($order->shipping, 2, ',', '.').' €' }}</span></div>
            <div class="summary__total"><span>Total</span><span>{{ number_format($order->total, 2, ',', '.') }} €</span></div>
            <p class="muted" style="font-size:.85rem;margin-top:1rem">
                Envío a: {{ $order->address }}, {{ $order->postal_code }} {{ $order->city }}
                ({{ $order->province }})<br>
                Pago: {{ $order->payment_method === 'cod' ? 'Contra reembolso' : 'Transferencia bancaria' }}
            </p>
            <a href="{{ route('shop') }}" class="btn btn--block mt-2">Seguir comprando</a>
        </div>
    </div>
</div>
@endsection
