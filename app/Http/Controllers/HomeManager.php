<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductManager;

class HomeManager extends Controller
{

    public function __invoke(Request $request)
    {
        $products = app(ProductManager::class)->getAllProducts();
        return view('home', compact('products'));
    }
}