<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductManager extends Controller
{
    function getAllProducts (){
        $products = Product::all();
        return $products;
    }

    function getProductById(string $id){
        $product = Product::find($id);
        return $product;
    }
}
