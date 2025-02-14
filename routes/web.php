<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wc', function () {
    return view('index-test');
});

Route::get('/index', function () {
    return view('backend.index');
});

Route::get('/products', function () {
    return view('backend.products');
});