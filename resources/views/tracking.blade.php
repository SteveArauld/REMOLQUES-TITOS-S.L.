@extends('layouts.wp')

@section('title', 'Seguimiento de pedidos — Remolques Titos')

@section('content')
<div class="lv-scope container" style="padding:24px 0 48px">
    <h1>Seguimiento de pedidos</h1>

    <div class="panel" style="max-width:560px">
        <form method="post" action="{{ route('tracking.track') }}">
            @csrf
            <div class="field">
                <label>Número de pedido</label>
                <input type="text" name="order_number" value="{{ old('order_number') }}" placeholder="TR-20260830-0001" required>
                @error('order_number')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label>Email del pedido</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <button class="btn" type="submit">Consultar</button>
        </form>
    </div>

    @isset($order)
        @if ($order)
            <div class="panel mt-3">
                <h3 style="margin-top:0">Pedido {{ $order->order_number }}</h3>
                <p>Estado: <strong>{{ ucfirst($order->status) }}</strong> · Fecha: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <table class="table">
                    <thead><tr><th>Producto</th><th>Cantidad</th><th>Total</th></tr></thead>
                    <tbody>
                    @foreach ($order->items as $item)
                        <tr><td>{{ $item->name }}</td><td>{{ $item->quantity }}</td><td>{{ number_format($item->line_total, 2, ',', '.') }} €</td></tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="summary__total"><span>Total</span><span>{{ number_format($order->total, 2, ',', '.') }} €</span></p>
            </div>
        @endif
    @endisset
</div>
@endsection
