@extends('layouts.app')

@section('title', 'Admin — Mensajes')

@section('content')
    <p><a href="{{ route('admin.orders') }}">← Pedidos</a></p>
    <h1>Mensajes de contacto</h1>

    @forelse ($messages as $m)
        <div class="panel mb-2">
            <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.5rem">
                <strong>{{ $m->name }}</strong>
                <a href="mailto:{{ $m->email }}">{{ $m->email }}</a>
                <span class="muted">{{ $m->phone }}</span>
                <span class="muted">{{ $m->created_at->format('d/m/Y H:i') }}</span>
            </div>
            @if ($m->subject)<p><strong>{{ $m->subject }}</strong></p>@endif
            <p style="white-space:pre-line">{{ $m->message }}</p>
        </div>
    @empty
        <div class="panel">No hay mensajes.</div>
    @endforelse

    <div class="pagination">{{ $messages->links() }}</div>
@endsection
