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
// Route::get('showproductdetail', function () {
//     return view('showproductdetail');
// });
Route::get('/showproduct/brand={brand}', [ProductController::class, 'showproduct'])
     ->name('showproduct.bybrand');

Route::get('/showproduct', [ProductController::class, 'showproduct'])
     ->name('showproduct');
// หน้า Product แบบง่าย (ไม่ต้องมี Controller)
Route::view('/product', 'Product')->name('product.index');

// เผื่อมีลิงก์เก่าใช้ /Product (ตัว P ใหญ่) ให้ redirect มาหน้าใหม่
Route::redirect('/Product', '/product', 301);

Route::get('/showproduct/{catSlug?}', [ProductController::class, 'showproduct'])
  ->where('catSlug', '[A-Za-z0-9\-]+')
  ->name('showproduct.bycat');

Route::get('/search/products', [ProductController::class, 'searchByName'])
    ->name('search.products');


Route::get('/product/{iditem}', [ProductController::class, 'showProductDetail'])
    ->name('showproduct.byiditem');