<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Google_Client;
use App\Services\Cloud\GoogleDrive;
use Illuminate\Support\Str;
use \Illuminate\Http\Request;
use App\Models\Area;
use App\Models\AreaStatus;
use App\Models\Gallery;
use App\Models\CategoryInfrastructure;
use App\Models\Comment;
use App\Models\Infrastructure;
use App\Models\Menu;
use App\Models\News;
use App\Models\NewsLike;
use App\Models\Page;

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

        /*$googleDrive = new GoogleDrive();
        if (Str::contains(\Request::getRequestUri(), ['/admin/'])) {
            if ((request()->segment(count(request()->segments())) == '_handle_action_') && ('POST' == $_SERVER['REQUEST_METHOD'])) {
                $action = request('_action') ?? '';
                if ('Encore_Admin_Grid_Actions_Delete' == $action) {
                    $modelName = explode('_', (request('_model') ?? ''));
                    $modelName = end($modelName);
                    if ($modelName) {
                        $modelId = request('_key') ?? 0;
                        //$obj = $modelName::find($modelId);
                        $obj = call_user_func('\\App\\Models\\'. $modelName . '::find', $modelId);
                        $filesToDelete = [];
                        if (property_exists($obj, 'image')) {
                            $filesToDelete[] = $obj->image;
                        }
                        if (property_exists($obj, 'plan')) {
                            $filesToDelete[] = $obj->plan;
                        }
                        if (property_exists($obj, 'survey')) {
                            $filesToDelete[] = $obj->survey;
                        }
                        if (property_exists($obj, 'video')) {
                            $filesToDelete[] = $obj->video;
                        }
                        foreach ($filesToDelete as $file) {
                            $googleDrive->deleteFileById($file);
                        }
                    }
                }
            }
        }*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Gallery::observe(\App\Observers\GalleryObserver::class);
    }
}
