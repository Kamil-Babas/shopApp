<?php

namespace App\Http\Controllers;

use App\Models\Product;

class IndexController extends Controller
{
    public function index ()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view("welcome", compact("products"));
    }
}
