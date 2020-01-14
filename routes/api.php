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

Route::post('login', ['uses'=>'API\AuthController@login','as'=>'login']);
Route::post('register', 'API\AuthController@register');

Route::namespace('API')->group(['middleware' => 'auth:api'], function(){

    Route::get('/search-area/{num}', ['uses' => 'AreaController@searchArea', 'as' => 'search_area']);
    Route::get('/fetch-areas', ['uses' => 'AreaController@fetchAreas', 'as' => 'fetch_areas']);
    Route::get('/filter-by-status/{status}', ['uses' => 'AreaController@filterByStatus', 'as' => 'filter_by_status']);
    Route::get('/show-specific/{id}', ['uses' => 'AreaController@show', 'as' => 'show_specific']);
    Route::get('/download-plan/{id}', ['uses' => 'AreaController@downloadPlan', 'as' => 'download_plan']);
    Route::get('/download-survey/{id}', ['uses' => 'AreaController@downloadSurvey', 'as' => 'download_survey']);

    Route::get('/pages', ['uses' => 'PagesController@fetchPages']);
    Route::get('/page/{slug}', ['uses' => 'PagesController@getByUniqueSlug']);

    Route::get('/news', ['uses' => 'NewsController@fetchNews']);
    Route::get('/infrastructure-items', ['uses' => 'InfrastructureController@fetchInfrastructureItems']);
    Route::get('/gallery-items', ['uses' => 'GalleryController@fetchGalleryItems']);

    Route::post('logout', 'API\AuthController@logout');
    Route::post('check', 'API\AuthController@check');
});
