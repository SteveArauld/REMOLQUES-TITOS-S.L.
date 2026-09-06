<x-mail::message>
# Gracias por tu pedido, {{ $order->customer_name }}

Hemos recibido tu pedido **{{ $order->order_number }}** correctamente.

<x-mail::table>
| Producto | Cant. | Precio | Total |
| :------- | :---: | -----: | ----: |
@foreach ($order->items as $item)
| {{ $item->name }} | {{ $item->quantity }} | {{ number_format($item->price, 2, ',', '.') }} € | {{ number_format($item->line_total, 2, ',', '.') }} € |
@endforeach
</x-mail::table>

**Subtotal:** {{ number_format($order->subtotal, 2, ',', '.') }} €
**Envío:** {{ $order->shipping == 0 ? 'Gratis' : number_format($order->shipping, 2, ',', '.').' €' }}
**Total:** {{ number_format($order->total, 2, ',', '.') }} €

**Envío a:** {{ $order->address }}, {{ $order->postal_code }} {{ $order->city }} ({{ $order->province }})
**Método de pago:** {{ $order->payment_method === 'cod' ? 'Contra reembolso' : 'Transferencia bancaria' }}

<x-mail::button :url="route('tracking.form')">
Seguir mi pedido
</x-mail::button>

Gracias por confiar en Remolques Titos.
</x-mail::message>
