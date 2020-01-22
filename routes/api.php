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

// 3-rd auth parties...
    Route::namespace('OAuth')->prefix('oauth')->middleware('web')->group(function () {
        Route::prefix('google')->group(function () {
            Route::get('authenticate', ['uses' => 'GoogleController@authenticate']);
            Route::get('callback', ['uses' => 'GoogleController@callback']);
        });
        Route::prefix('youtube')->group(function () {
            Route::get('authenticate', ['uses' => 'YoutubeController@authenticate']);
            Route::get('callback', ['uses' => 'YoutubeController@callback']);
        });
        Route::prefix('facebook')->group(function () {
            Route::get('authenticate', ['uses' => 'FacebookController@authenticate']);
            Route::get('callback', ['uses' => 'FacebookController@callback']);
        });
        Route::prefix('instagram')->group(function() {
            Route::get('authenticate', ['uses' => 'InstagramController@authenticate']);
            Route::get('callback', ['uses' => 'InstagramController@callback']);
        });
    });

    Route::namespace('API')->group(function () {

        Route::post('login', ['uses' => 'AuthController@login', 'as' => 'login']);
        Route::post('register', 'AuthController@register');

        Route::group(['middleware' => ['uuid']], function () {
            Route::get('/search-area/{num}', ['uses' => 'AreaController@searchArea', 'as' => 'search_area']);
            Route::get('/fetch-areas', ['uses' => 'AreaController@fetchAreas', 'as' => 'fetch_areas']);
            Route::get('/filter-by-status/{status}', ['uses' => 'AreaController@filterByStatus', 'as' => 'filter_by_status']);
            Route::get('/show-specific/{id}', ['uses' => 'AreaController@show', 'as' => 'show_specific']);
            Route::get('/download-plan/{id}', ['uses' => 'AreaController@downloadPlan', 'as' => 'download_plan']);
            Route::get('/download-survey/{id}', ['uses' => 'AreaController@downloadSurvey', 'as' => 'download_survey']);

            Route::get('/pages', ['uses' => 'PagesController@fetchPages']);
            Route::get('/page/{slug}', ['uses' => 'PagesController@getByUniqueSlug']);

            Route::get('/news', ['uses' => 'NewsController@fetchNews']);
            Route::put('/news_like/{news_id}', ['uses' => 'NewsController@setLike']);

            Route::post('/add_comment/{news_id}', ['uses' => 'CommentController@addComment']);

            Route::get('/infrastructure-items', ['uses' => 'InfrastructureController@fetchInfrastructureItems']);
            Route::get('/gallery-items', ['uses' => 'GalleryController@fetchGalleryItems']);

            Route::post('logout', 'AuthController@logout');
        });

        Route::get('/news_comments/{news_id}', ['uses' => 'CommentController@getComments']);

        Route::delete('/delete_comment/{comment_id}', ['uses' => 'CommentController@deleteComment'])->middleware('admin');//->middleware('uuid_admin');
    });
