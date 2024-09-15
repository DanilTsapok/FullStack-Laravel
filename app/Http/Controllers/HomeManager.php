<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeManager extends Controller
{
    function backHome(){
        $products = app(ProductManager::class)->getAllProducts();
        return view('home', compact('products'));
    }
}
