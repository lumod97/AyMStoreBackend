<?php

use Illuminate\Support\Facades\Route;


// Rutas protegidas por Sanctum


Route::post('login', 'App\Http\Controllers\AuthController@login');

Route::post('add-new-product', 'App\Http\Controllers\ProductController@newProduct');
Route::post('get-products', 'App\Http\Controllers\ProductController@getProducts');
Route::post('delete-products', 'App\Http\Controllers\ProductController@deleteProduct');
Route::post('delete-products-by-id', 'App\Http\Controllers\ProductController@deleteProductsById');
Route::post('get-product-by-id', 'App\Http\Controllers\ProductController@getProductById');
Route::post('update-product', 'App\Http\Controllers\ProductController@updateProducts');
Route::middleware('auth:sanctum')->group(function () {
});

