<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($q = $request->get('q'))) {
            $categories = Category::with([
                'products' => function ($query) use ($q) {
                    $query->where('name', 'like', '%'.$q.'%')
                        ->orWhere('description', 'like', '%'.$q.'%');
                }
            ])->get()
                ->filter(function($category) {
                    return $category->products->isNotEmpty();
                })
                ->values();
        } else {
            $categories = Category::with('products')->get();
        }

        return view('products.index', compact('categories', 'q'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        dd($request);
    }

    public function byCategory($categoryId)
    {
        $category = Category::with('products')->findOrFail($categoryId);
        return view('products.category', compact('category'));
    }
}
