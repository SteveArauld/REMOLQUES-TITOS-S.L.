@extends('layouts.app')

@section('title', 'Admin — '.$order->order_number)

@section('content')
    <p><a href="{{ route('admin.orders') }}">← Todos los pedidos</a></p>
    <h1>{{ $order->order_number }}</h1>

    <div class="layout" style="grid-template-columns:1fr 320px">
        <div>
            <table class="table">
                <thead><tr><th>Producto</th><th>Precio</th><th>Cant.</th><th>Total</th></tr></thead>
                <tbody>
                @foreach ($order->items as $item)
                    <tr><td>{{ $item->name }}</td><td>{{ number_format($item->price, 2, ',', '.') }} €</td><td>{{ $item->quantity }}</td><td>{{ number_format($item->line_total, 2, ',', '.') }} €</td></tr>
                @endforeach
                </tbody>
            </table>

            <div class="panel mt-3">
                <h3 style="margin-top:0">Cliente</h3>
                <p>{{ $order->customer_name }}<br>
                   {{ $order->customer_email }}<br>
                   {{ $order->customer_phone }}<br>
                   {{ $order->address }}, {{ $order->postal_code }} {{ $order->city }} ({{ $order->province }}), {{ $order->country }}</p>
                @if ($order->notes)<p><strong>Notas:</strong> {{ $order->notes }}</p>@endif
                <p><strong>Pago:</strong> {{ $order->payment_method === 'cod' ? 'Contra reembolso' : 'Transferencia bancaria' }}</p>
            </div>
        </div>

        <div class="summary">
            <div class="summary__line"><span>Subtotal</span><span>{{ number_format($order->subtotal, 2, ',', '.') }} €</span></div>
            <div class="summary__line"><span>Envío</span><span>{{ number_format($order->shipping, 2, ',', '.') }} €</span></div>
            <div class="summary__total"><span>Total</span><span>{{ number_format($order->total, 2, ',', '.') }} €</span></div>

            <form method="post" action="{{ route('admin.order.status', $order->order_number) }}" class="mt-2">
                @csrf @method('PATCH')
                <div class="field">
                    <label>Estado</label>
                    <select name="status">
                        @foreach (['pending','processing','shipped','completed','cancelled'] as $s)
                            <option value="{{ $s }}" @selected($order->status === $s)>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn--block" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection
