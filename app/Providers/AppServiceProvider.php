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

            Schema::table('pages', function (Blueprint $table) {
                $table->string('slug')->unique();
            });

            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('link');
            });

            Schema::table('menus', function (Blueprint $table) {
                $table->string('slug')->unique();
            });
            Schema::table('menus', function (Blueprint $table) {
                $table->dropColumn('link');
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
