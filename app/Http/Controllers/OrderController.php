<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Корзина пуста');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'status' => StatusEnum::New->value,
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Заказ успешно оформлен');
    }

    public function show($id)
    {
        $order = Order::with('products.product')->findOrFail($id);

        if ($order->user_id != Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    public function index()
    {
        $statuses = StatusEnum::toArrayWithKeys();
        $selectedStatus = request()->input('status');

        $query = auth()->user()->orders()
            ->with(['products'])
            ->orderByDesc('id');

        if ($selectedStatus && array_key_exists($selectedStatus, $statuses)) {
            $query->where('status', $selectedStatus);
        }

        $orders = $query->get();

        return view('orders.index', compact('orders', 'statuses', 'selectedStatus'));
    }
}
