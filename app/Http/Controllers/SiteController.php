<?php

namespace App\Http\Controllers;

use App\Models\Category;

class SiteController extends Controller
{
    public function home()
    {
        $categories = Category::take(6)->get();

        return view('home', compact('categories'));
    }
}
