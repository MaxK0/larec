<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShareCartCountMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cartCount = 0;
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
        }

        view()->share('cartCount', $cartCount);

        return $next($request);
    }
}
