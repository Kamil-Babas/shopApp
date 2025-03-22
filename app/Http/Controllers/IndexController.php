<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class IndexController extends Controller
{
    public function index ()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $categories = ProductCategory::orderBy('name', 'ASC')->get();

        return view("index", compact("products", "categories"));
    }

}
