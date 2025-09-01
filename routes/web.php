<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Hikari');
});
Route::get('Product', function () {
    return view('Product');
});
Route::get('footer', function () {
    return view('footer');
});
