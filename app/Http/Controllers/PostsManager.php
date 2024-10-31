<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PostsManager extends Controller
{
   
    function getAllPosts (){
        $posts = Post::with('creator')->orderBy('created_at', 'desc')->get();
        return $posts;
    }
        
    function getPostsAuthUser(string $id){
        $allPosts = Post::where('creator_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $allPosts;
    }

    function getPostById(string $id){
        $post = Post::find($id);
        return $post;
    }

    function createPost(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'description'=> 'required|string',
        ]);
          
        $data = [
            'id'=> Str::uuid(),
            'name'=> $request->name,
            'description'=> $request->description,
            'creator_id'=>Auth::user()->id,
            'likes'=>0,
            'created_at'=>now(),
        ];

        $post = DB::table('posts')->insert($data);

        if($post){
            
            if(Route::currentRouteName() == "home"){
                return redirect(route('home'))->with('success','Post created successfully');
            }
            return redirect(route('profileView'));
        }
        return redirect(route('home'))->with('error','Post creation failed, try again');
    }

    function addLike(string $id)
    {
        $user = Auth::user();
        $post = Post::find($id);
    
        if ($post && !$post->likes()->where('user_id', $user->id)->exists()) {
            $post->increment('likes');
            $post->likes()->attach($user->id);
        }
    
        return back();
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
    
    function deletePost(string $id){
        $deletePost = DB::table('posts')-> where('id', $id)->delete();

        if($deletePost){
            return redirect(route('profileView'))->with('Success','Post deleted successfully');
        }else{
            return redirect(route('profileView'))->with('error','Failed to delete product');
        }    
    }

}
