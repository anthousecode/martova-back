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
       // \DB::unprepared(file_get_contents(app_path() . '/dump.sql'));

        // todo add fixes to migration and clear method, check rules in admin controllers

        if (Schema::hasColumn('pages', 'slug')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('slug')->nullable()->unique();
            });
        }
        if (Schema::hasColumn('pages', 'link')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('link');
            });
        }
        if (!Schema::hasColumn('menus', 'slug')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->string('slug')->nullable()->unique();
            });
        }
        if (Schema::hasColumn('menus', 'link')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->dropColumn('link');
            });
        }

        Schema::table('infrastructures', function(Blueprint $table){
            $table->dropColumn([
                'ru_name',
                'ru_description',
                'ua_name',
                'ua_description'
            ]);/*
            $table->string('ru_name')->default('-')->nullable();
            $table->text('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->text('ua_description')->default('-')->nullable();
        */});

        Schema::table('news', function(Blueprint $table){
            $table->dropColumn([
                'ru_name',
                'ru_description',
                'ua_name',
                'ua_description'
            ]);
          /*  $table->string('ru_name')->default('-')->nullable();
            $table->text('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->text('ua_description')->default('-')->nullable();
        */});

        Schema::table('category_infrastructures', function(Blueprint $table){
            $table->dropColumn([
                'ru_name',
                'ua_name'
            ]);
            /*$table->string('ru_name')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
        */});

        Schema::table('menus', function(Blueprint $table){
            $table->dropColumn([
                'ru_name',
                'ua_name',
                'link',
                'order'
            ]);
           /* $table->string('ru_name')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->string('link')->default('-')->nullable();
            $table->integer('order')->default(0);
        */});

        Schema::table('area_statuses', function(Blueprint $table){
            $table->dropColumn([
                'ru_name',
                'ua_name'
            ]);
//            $table->string('ru_name')->default('-')->nullable();
//            $table->string('ua_name')->default('-')->nullable();
        });

        Schema::table('pages', function(Blueprint $table){
            $table->dropColumn([
                'ru_title',
                'ru_content',
                'ua_title',
                'ua_content'
            ]);
//            $table->string('ru_title')->default('-')->nullable();
//            $table->longText('ru_content')->default('-')->nullable();
//            $table->string('ua_title')->default('-')->nullable();
//            $table->longText('ua_content')->default('-')->nullable();
        });

        \URL::forceScheme('https');
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
