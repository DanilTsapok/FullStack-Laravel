<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartManager extends Controller
{
    function cartView (){
        return view('cart');
    }
}
