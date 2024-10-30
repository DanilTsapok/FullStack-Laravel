<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsManager;

class ProfileManager extends Controller
{
    function profileView(){
        $posts = app(PostsManager::class)->getPostsAuthUser(Auth::user()->id);
        return view('profile', compact('posts'));
    }

   
}
