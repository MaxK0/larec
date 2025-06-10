<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class SiteController extends Controller
{
    public function home()
    {
        $categories = Category::take(8)->get();

        $popularProducts = Product::withCount(['orders' => function($query) {
            $query->where('date_order', '>=', now()->subWeek());
        }])
            ->orderBy('orders_count', 'desc')
            ->take(8)
            ->get();

        return view('home', compact('categories', 'popularProducts'));
    }
}
