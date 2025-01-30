<?php

use Illuminate\Support\Facades\Route;

Route::get('/wc', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('backend.index');
});