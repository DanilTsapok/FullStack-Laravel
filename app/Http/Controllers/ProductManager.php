<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductManager extends Controller
{
   
    function getAllProducts (){
        $products = DB::table('products')->get();
        return $products;
    }

    function getAllProductsEloquent (){
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
            'image'=> 'required|string',
            'description'=> 'required|string',
            'price'=> 'required',
            'stock'=>'required|integer',
        ]);
          
        $data = [
            'id'=> Str::uuid(),
            'name'=> $request->name,
            'image'=>$request->image,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock
        ];

        $product = DB::table('products')->insert($data);

        if($product){
            return redirect(route('adminDashboard.get'))->with('success','Product created successfully');
        }
        return redirect(route('adminDashboard.get'))->with('error','Product creation failed, try again');
    }

    function createProductEloquent(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'image'=> 'required|string',
            'description'=> 'required|string',
            'price'=> 'required|decimal',
            'stock'=>'required|integer',
        ]);
        $data = [
            'id'=> Str::uuid(),
            'name'=> $request->name,
            'image'=> 'required|string',
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock
        ];
        $product = Product::create($data);
        if($product){
            return redirect()->back()->with('success','Product created successfully');
        }
        return redirect()->back()->with('error','Product creation failed, try again');
    }

    function updateProductView($id){

        $product = Product::find($id);
        return view('editFormProduct', ['product'=>$product]);
    }

    function updateProduct(Request $request, $id)
    {
     
        $request->validate([
            'name' => 'nullable|string',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
        ]);
    
        $data = $request->only(['name', 'image', 'description', 'price', 'stock']);
    
        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });
        $updateProduct = DB::table('products')->where('id', $id)->update($data);
    
        if ($updateProduct) {
            return redirect(route('adminDashboard.get'))->with('success', 'Product updated successfully');
        }
    
        return redirect(route('adminDashboard.get'))->with('error', 'Failed to update product');
    }
    
    function updateProductEloquent(Request $request, $id){
        $request->validate([
            'name'=> 'required|string',
            'image'=>'required|string',
            'description'=> 'required|string',
            'price'=> 'required',
            'stock'=>'required|integer',
        ]);
        

        $data =[
            'name'=> $request->name,
            'image'=> $request->image,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock

        ];
       
      
         $updateProduct= Product::find($id)->update($data);
        if($updateProduct){
            return redirect()->back()->with('success', 'Product updated successfuly');
        }
        return redirect()->back()->with('error', 'Failed to update product');
    }

    function deleteProduct($id){
        $deleteProduct = DB::table('products')->where('id', $id)->delete();
        if($deleteProduct){
            return redirect(route('adminDashboard.get'))->with('Success','Product deleted successfuly');
        }else{
            return redirect(route('adminDashboard.get'))->with('error','Failed to delete product');
        }    
    }
    function deleteProductEloquent($id){
        $deleteProduct = Product::findOrFail($id)->delete();
        if($deleteProduct){
            return redirect(route('adminDashboard.get'))->with('Success','Product deleted successfuly');
        }else{
            return redirect(route('adminDashboard.get'))->with('error','Failed to delete product');
        }    
    }
}
