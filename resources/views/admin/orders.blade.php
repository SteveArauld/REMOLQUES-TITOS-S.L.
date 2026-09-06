@extends('layouts.app')

@section('title', 'Admin — Pedidos')

@section('content')
    <div style="display:flex;justify-content:space-between;align-items:center">
        <h1>Pedidos</h1>
        <a href="{{ route('admin.messages') }}" class="btn btn--ghost">Mensajes de contacto ({{ $messagesCount }})</a>
    </div>

    <table class="table">
        <thead><tr><th>Pedido</th><th>Cliente</th><th>Fecha</th><th>Artículos</th><th>Total</th><th>Estado</th><th></th></tr></thead>
        <tbody>
        @forelse ($orders as $order)
            <tr>
                <td><a href="{{ route('admin.order', $order->order_number) }}">{{ $order->order_number }}</a></td>
                <td>{{ $order->customer_name }}<br><span class="muted" style="font-size:.8rem">{{ $order->customer_email }}</span></td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->items_count }}</td>
                <td>{{ number_format($order->total, 2, ',', '.') }} €</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td><a href="{{ route('admin.order', $order->order_number) }}">Ver</a></td>
            </tr>
        @empty
            <tr><td colspan="7">Todavía no hay pedidos.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $orders->links() }}</div>
@endsection
