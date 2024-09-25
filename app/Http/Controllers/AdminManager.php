<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminManager extends Controller
{
    function getAdminDashboard(){
        $products = app(ProductManager::class)->getAllProducts();
        return view('adminDashboard',compact('products'));
    }
}
