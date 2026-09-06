<?php

namespace App\Http\Controllers;

use App\Mail\NewOrderAdminMail;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function show()
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart.index')->with('status', 'Tu cesta está vacía.');
        }

        return view('checkout', ['items' => $this->cart->items()]);
    }

    public function store(Request $request)
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart.index')->with('status', 'Tu cesta está vacía.');
        }

        $data = $request->validate([
            'customer_name'  => ['required', 'string', 'max:150'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['nullable', 'string', 'max:40'],
            'address'        => ['required', 'string', 'max:255'],
            'city'           => ['required', 'string', 'max:120'],
            'postal_code'    => ['required', 'string', 'max:20'],
            'province'       => ['nullable', 'string', 'max:120'],
            'notes'          => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'in:cod,transfer'],
        ]);

        $order = DB::transaction(function () use ($data) {
            $order = Order::create([
                ...$data,
                'order_number' => Order::generateNumber(),
                'country'      => 'España',
                'subtotal'     => $this->cart->subtotal(),
                'shipping'     => $this->cart->shipping(),
                'total'        => $this->cart->total(),
                'status'       => 'pending',
            ]);

            foreach ($this->cart->items() as $line) {
                $order->items()->create([
                    'product_id' => $line['id'],
                    'name'       => $line['name'],
                    'image'      => $line['image'] ?? null,
                    'price'      => $line['price'],
                    'quantity'   => $line['qty'],
                    'line_total' => $line['line_total'],
                ]);
            }

            return $order;
        });

        $order->load('items');

        // Emails : confirmation client + notification admin.
        try {
            Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));
            Mail::to(config('mail.admin_address'))->send(new NewOrderAdminMail($order));
        } catch (\Throwable $e) {
            Log::error('Fallo al enviar emails de pedido: '.$e->getMessage());
        }

        $this->cart->clear();

        return redirect()->route('checkout.thankyou', $order);
    }

    public function thankYou(Order $order)
    {
        $order->load('items');

        return view('thank-you', compact('order'));
    }
}
