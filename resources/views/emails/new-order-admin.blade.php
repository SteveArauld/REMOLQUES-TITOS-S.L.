<x-mail::message>
# Nuevo pedido: {{ $order->order_number }}

**Cliente:** {{ $order->customer_name }} ({{ $order->customer_email }}{{ $order->customer_phone ? ', '.$order->customer_phone : '' }})
**Dirección:** {{ $order->address }}, {{ $order->postal_code }} {{ $order->city }} ({{ $order->province }}), {{ $order->country }}
**Pago:** {{ $order->payment_method === 'cod' ? 'Contra reembolso' : 'Transferencia bancaria' }}
@if ($order->notes)
**Notas:** {{ $order->notes }}
@endif

<x-mail::table>
| Producto | Cant. | Total |
| :------- | :---: | ----: |
@foreach ($order->items as $item)
| {{ $item->name }} | {{ $item->quantity }} | {{ number_format($item->line_total, 2, ',', '.') }} € |
@endforeach
</x-mail::table>

**Subtotal:** {{ number_format($order->subtotal, 2, ',', '.') }} €
**Envío:** {{ number_format($order->shipping, 2, ',', '.') }} €
**Total:** {{ number_format($order->total, 2, ',', '.') }} €

<x-mail::button :url="url('/admin/pedidos/'.$order->order_number)">
Ver en el panel
</x-mail::button>
</x-mail::message>
