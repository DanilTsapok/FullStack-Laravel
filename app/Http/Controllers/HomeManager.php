<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductManager;

class HomeManager extends Controller
{

    public function __invoke(Request $request)
    {
        $posts = app(PostsManager::class)->getAllPosts();
        return view('home',compact('posts'));
    }
}