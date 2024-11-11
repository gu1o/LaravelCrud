<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})-> name('home');


Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);