<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function(){
    Route::get('/search-area/{num}', ['uses' => 'AreaController@searchArea', 'as' => 'search_area']);
    Route::get('/fetch-areas', ['uses' => 'AreaController@fetchAreas', 'as' => 'fetch_areas']);
    Route::get('/news', function(){
       return App\Models\News::all()->toJson();
    });
    Route::get('/infrastructures', function(){
        return App\Models\Infrastructure::with('category')->get()->toJson();
    });
    Route::get('/gallery-items', function(){
        return App\Models\Gallery::all()->toJson();
    });
    Route::get('/menu-items', function(){
        return App\Models\Menu::orderBy('order', 'ASC')->get()->toJson();
    });
});
