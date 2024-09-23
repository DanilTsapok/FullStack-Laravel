<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileManager extends Controller
{
    function profileView(){
        return view('profile');
    }
}
