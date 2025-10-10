<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrochureController;
Route::get('/', function () {
    return view('Hikari');
});
Route::get('/product', [BrochureController::class, 'index'])->name('product.index');
Route::get('footer', function () {
    return view('footer');
});
Route::get('header', function () {
    return view('header');
});
// Route::get('showproductdetail', function () {
//     return view('showproductdetail');
// });
Route::get('/showproduct/brand={brand}', [ProductController::class, 'showproduct'])
     ->name('showproduct.bybrand');

Route::get('/showproduct', [ProductController::class, 'showproduct'])
     ->name('showproduct');

Route::get('/showproduct/{catSlug?}', [ProductController::class, 'showproduct'])
  ->where('catSlug', '[A-Za-z0-9\-]+')
  ->name('showproduct.bycat');

Route::get('/search/products', [ProductController::class, 'searchByName'])
    ->name('search.products');


Route::get('/product/{iditem}', [ProductController::class, 'showProductDetail'])
    ->name('showproduct.byiditem');
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/admin/login', [AdminController::class, 'showLogin']);
Route::post('/admin/login', [AdminController::class, 'doLogin']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin/product/{iditem}/edit', [AdminController::class, 'editProductForm'])
    ->name('admin.product.edit');


Route::post('/admin/product/{iditem}/update', [AdminController::class, 'updateProduct'])
    ->name('admin.product.update');

Route::delete('/admin/brochure/{id_service}/delete', [AdminController::class, 'deletebrochure'])
    ->name('admin.brochure.delete');

Route::post('/admin/upload-csv', [AdminController::class, 'uploadCsv'])->name('admin.upload-csv');

Route::delete('/admin/product/{iditem}/delete', [AdminController::class, 'deleteProduct'])
    ->name('admin.product.delete');

Route::post('/admin/addbrochures', [AdminController::class, 'addbrochures'])->name('service.addbrochures');


Route::get('/test', function () {
    return view('new.test');   // เรียกไฟล์ test.blade.php
});
