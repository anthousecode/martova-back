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
    Route::get('/filter-by-status/{status}', ['uses' => 'AreaController@filterByStatus', 'as' => 'filter_by_status']);
    Route::get('/show-specific/{id}', ['uses' => 'AreaController@show', 'as' => 'show_specific']);
    Route::get('/download-plan/{id}', ['uses' => 'AreaController@downloadPlan', 'as' => 'download_plan']);
    Route::get('/download-survey/{id}', ['uses' => 'AreaController@downloadSurvey', 'as' => 'download_survey']);

    Route::get('/pages', ['uses' => 'PagesController@fetchPages']);
    Route::get('/page/{slug}', ['uses' => 'PagesController@getByUniqueSlug']);

    Route::get('/news', ['uses' => 'NewsController@fetchNews']);
    Route::get('/infrastructure-items', ['uses' => 'InfrastructureController@fetchInfrastructureItems']);
    Route::get('/gallery-items', ['uses' => 'GalleryController@fetchGalleryItems']);
});
