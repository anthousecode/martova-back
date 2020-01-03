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
    $ip = '0.0.0.0';
    $ip = $_SERVER['REMOTE_ADDR'];
    $clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
    echo "You're logged in from: <b>" . json_encode($clientDetails) . "</b>";
});