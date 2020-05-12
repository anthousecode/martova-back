<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Services\Repositories\Abstractions\IMediaManager;
use App\Services\Repositories\FilesystemRepository;

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

        // CENTRALIZED MEDIA-MANAGEMENT REPOSITORY DEFINITION
        $this->app->bind(IMediaManager::class, config('filesystems.repository'));
        $this->app->bind('media_manager', function () {
            return app(config('filesystems.repository'));
        });

        // helpers ...
        require_once app_path('Services/Helpers/Logger.php');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Gallery::observe(\App\Observers\GalleryObserver::class);
        \App\Models\Area::observe(\App\Observers\AreaObserver::class);
        \App\Models\Infrastructure::observe(\App\Observers\InfrastructureObserver::class);
        \App\Models\News::observe(\App\Observers\NewsObserver::class);
    }
}
