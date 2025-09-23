<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('Hikari');
});
Route::get('Product', function () {
    return view('Product');
});
Route::get('footer', function () {
    return view('footer');
});
Route::get('/showproduct/brand={brand}', [ProductController::class, 'showproduct'])
     ->name('showproduct.bybrand');

Route::get('/showproduct', [ProductController::class, 'showproduct'])
     ->name('showproduct');


Route::get('/showproduct/{catSlug?}', [ProductController::class, 'showproduct'])
  ->where('catSlug', '[A-Za-z0-9\-]+')
  ->name('showproduct.bycat');

Route::get('/search/products', [ProductController::class, 'searchByName'])
    ->name('search.products');