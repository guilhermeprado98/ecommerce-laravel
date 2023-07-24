<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::all();
        return view('frontend.index', compact('featured_products'));
    }

    public function productview($id)
    {
        if (Product::where('id', $id)->exists()) {
            $products = Product::where('id', $id)->first();
            return view('frontend.products.view', compact('products'));
        }
    }
}
