<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('foo');
});

Route::get('/3d', function(){
    return view('3d');
});

Route::get('/360', function(){
    return view('360');
})->name('360p');