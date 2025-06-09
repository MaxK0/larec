<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $cartCount = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $cartCount += $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total', 'cartCount'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар удален из корзины');
        }

        return redirect()->back()->with('error', 'Товар не найден в корзине');
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Корзина обновлена');
        }

        return redirect()->back()->with('error', 'Товар не найден в корзине');
    }
}
