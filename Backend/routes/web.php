<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload-image', 'ProductController@uploadImage');
Route::get('/products', 'ProductController@index');
