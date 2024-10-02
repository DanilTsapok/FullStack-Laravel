<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\CartManager;
use App\Http\Controllers\HomeManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManager;
use App\Http\Controllers\ProductManager;
use App\Http\Controllers\ProfileManager;
Route::resource('products', ProductManager::class);
//Auth
Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::get('/registration',[AuthManager::class, 'register'])->name('register');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/registration',[AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');
// Cart


// Profile
Route::get('/profile', [ProfileManager::class, 'profileView'])->name('profileView');

//Home
Route::get('/', HomeManager::class)->name('home');

// Product

Route::get('/cart', [CartManager::class, 'cartView'])->name('cart')->middleware(CheckAdmin::class);

Route::get('/product/{id}',[ProductManager:: class, 'getProductById'])->name('getProduct.get');

Route::get('/dashboard/product/{id}/edit', [ProductManager:: class, 'updateProductView'])->middleware(CheckAdmin::class);

Route::put('/dashboard/product/{id}/edit', [ProductManager:: class, 'updateProduct'])->name('updateProduct.put');

Route::delete('/product/{id}', [ProductManager:: class, 'deleteProduct'])->name('deleteProduct.delete');

Route::get('/dashboard', [AdminManager::class,'getAdminDashboard'])->name('adminDashboard.get')->middleware(CheckAdmin::class);
Route::post('/dashboard/product/create', [ProductManager::class,'createProduct'])->name('createProduct.post')->middleware(CheckAdmin::class);
Route::get('/dashboard/product/create', function(){
    return view('createProduct');
})->middleware(CheckAdmin::class);