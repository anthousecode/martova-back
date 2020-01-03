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

Route::get('/clear-cache', function(){
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
});

Route::get('get-ip', function(){
    $geo = json_decode(file_get_contents('https://tools.keycdn.com/geo.json?host=' . $_SERVER['HTTP_X_FORWARDED_FOR']));
  dd($geo);
});