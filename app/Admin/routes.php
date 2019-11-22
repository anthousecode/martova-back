<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('news', NewsController::class);

    $router->resource('infrastructures', InfrastructureController::class);

    $router->resource('category-infrastructures', CategoryInfrastructureController::class);

    $router->resource('galleries', GalleryController::class);

    $router->resource('menus', MenusController::class);

    $router->resource('areas', AreasController::class);

    $router->resource('area-statuses', AreasStatusesController::class);

    $router->resource('pages', PagesController::class);

});
