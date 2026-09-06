@extends('layouts.wp')

@section('title', 'Mi cuenta — Remolques Titos')

@section('content')
<div class="lv-scope container" style="padding:24px 0 48px">
    <h1>Mi cuenta</h1>

    <div class="panel" style="max-width:560px">
        <p class="muted">Introduce el email con el que realizaste tus pedidos para ver tu historial.</p>
        <form method="get">
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ $email }}" required>
            </div>
            <button class="btn" type="submit">Ver mis pedidos</button>
        </form>
    </div>

    @if ($email)
        <h2 class="mt-4">Pedidos de {{ $email }}</h2>
        @forelse ($orders as $order)
            <div class="panel mb-2">
                <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.5rem">
                    <strong>{{ $order->order_number }}</strong>
                    <span class="muted">{{ $order->created_at->format('d/m/Y') }}</span>
                    <span>Estado: {{ ucfirst($order->status) }}</span>
                    <span>{{ number_format($order->total, 2, ',', '.') }} €</span>
                </div>
                <ul class="muted" style="font-size:.88rem;margin:.5rem 0 0">
                    @foreach ($order->items as $item)
                        <li>{{ $item->name }} × {{ $item->quantity }}</li>
                    @endforeach
                </ul>
            </div>
        @empty
            <div class="panel">No encontramos pedidos con ese email.</div>
        @endforelse
    @endif
</div>
@endsection
