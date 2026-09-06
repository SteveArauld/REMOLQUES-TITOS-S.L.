<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function trackingForm()
    {
        return view('wp.seguimiento-de-pedidos');
    }

    public function track(Request $request)
    {
        $number = $request->input('order_number', $request->input('orderid'));
        $email  = $request->input('email', $request->input('order_email'));

        $data = validator(
            ['order_number' => $number, 'email' => $email],
            ['order_number' => ['required', 'string'], 'email' => ['required', 'email']]
        )->validate();

        $order = Order::with('items')
            ->where('order_number', trim($data['order_number']))
            ->where('customer_email', trim($data['email']))
            ->first();

        if (! $order) {
            return back()
                ->withInput()
                ->with('status', 'No encontramos ningún pedido con esos datos. Revisa el ID de pedido y el correo electrónico.');
        }

        return view('tracking', compact('order'));
    }
}
