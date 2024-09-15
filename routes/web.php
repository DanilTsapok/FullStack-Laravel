<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\CartManager;
use App\Http\Controllers\HomeManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductManager;
Route::resource('products', ProductManager::class);
//Auth
Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::get('/registration',[AuthManager::class, 'register'])->name('register');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/registration',[AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

// Cart
Route::get('/cart', [CartManager::class, 'cartView'])->name('cart');

// Profile
Route::get('/profile', function (){
    return view('profile');
});

//Home
Route::get('/', [HomeManager::class, 'backHome'])->name('home');

// Product
Route::get('/product/{id}',[ProductManager:: class, 'getProductById'])->name('getProduct.get');


