<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Ana sayfa
Route::get('/', function () {
    return view('home');
});

// Ürünler için resource routes
Route::resource('products', ProductController::class);

// Kategoriler için route'ları daha sonra ekleyeceğiz
// Route::resource('categories', CategoryController::class);
