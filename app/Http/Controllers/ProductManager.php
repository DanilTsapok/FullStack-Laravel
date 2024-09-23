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

    function createProduct(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'description'=> 'required|string',
            'price'=> 'required|decimal',
            'stock'=>'required|integer',
        ]);

        $data = [
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock
        ];

        $product = DB::table('products')->insert($data);

        if($product){
            return redirect()->back()->with('success','Product created successfully');
        }
        return redirect()->back()->with('error','Product creation failed, try again');
    }

    
    function deleteProduct(string $id){
        $deleteProduct = DB::table('products')-> where('id', $id)->delete();
        if($deleteProduct){
            return redirect()->back()->with('Success','Product deleted successfull');
        }else{
            return redirect()->back()->with('error','Failed to delete product');
        }    
    }
}
