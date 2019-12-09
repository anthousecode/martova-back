<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //Schema::dropIfExists('areas');


        Schema::table('areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status_id')->nullable();
            $table->string('number')->nullable();
            $table->float('square')->nullable();
            $table->float('price')->nullable();
            $table->string('image')->nullable();
            $table->string('plan')->nullable();
            $table->string('survey')->nullable();
            $table->string('color')->nullable();
            $table->string('default_color')->nullable();
            $table->timestamps();
        });
die();
        /*
        Schema::dropIfExists('infrastructures');
        Schema::dropIfExists('news');
        Schema::dropIfExists('category_infrastructures');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('area_statuses');
        Schema::dropIfExists('pages');

        Schema::create('infrastructures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('ru_name')->default('-')->nullable();
            $table->text('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->text('ua_description')->default('-')->nullable();
            $table->string('image')->nullable();
            $table->integer('X')->nullable();
            $table->integer('Y')->nullable();
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_name')->default('-')->nullable();
            $table->text('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->text('ua_description')->default('-')->nullable();
            $table->string('image');
            $table->boolean('is_published')->nullable();
            $table->timestamps();
        });

        Schema::create('category_infrastructures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_name')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_name')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('area_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_name')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_title')->default('-')->nullable();
            $table->longText('ru_content')->default('-')->nullable();
            $table->string('ua_title')->default('-')->nullable();
            $table->longText('ua_content')->default('-')->nullable();
            $table->text('ru_meta_description')->default('-')->nullable();
            $table->text('ua_meta_description')->default('-')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
*/
       // \URL::forceScheme('https');

        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
