<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::withCount('items')->latest()->paginate(20);
        $messagesCount = ContactMessage::count();

        return view('admin.orders', compact('orders', 'messagesCount'));
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.order', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,processing,shipped,completed,cancelled'],
        ]);

        $order->update($data);

        return back()->with('status', 'Estado del pedido actualizado.');
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(30);

        return view('admin.messages', compact('messages'));
    }
}
