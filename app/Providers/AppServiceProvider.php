<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Google_Client;
use Illuminate\Support\Str;
use \Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \URL::forceScheme('https');
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

        if (!Schema::hasColumn('users', 'api_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('api_token', 36)->nullable();
            });
        }

        if (!Schema::hasTable('news_likes')) {
            Schema::create('news_likes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('news_id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('news_id');
                $table->integer('user_id');
                $table->mediumText('text');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('users', 'isAdmin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('isAdmin')->default(false);
            });
        }
        if ((!Schema::hasColumn('areas', 'cad_number')) || (!Schema::hasColumn('areas', 'stroke'))) {
            Schema::table('areas', function (Blueprint $table) {
                $table->string('cad_number')->nullable();
                $table->string('stroke')->nullable();
            });
        }
        if (!Schema::hasColumn('areas', 'polygon')) {
            Schema::table('areas', function (Blueprint $table) {
                $table->text('polygon')->nullable();
            });
        }

        $googleDrive = new \App\Services\Cloud\GoogleDrive();
        dd($googleDrive->fetchAllFiles());
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
