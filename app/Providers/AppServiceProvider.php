<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Google_Client;

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
             Schema::table('users', function(Blueprint $table){
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
            Schema::create('comments', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('news_id');
                $table->integer('user_id');
                $table->mediumText('text');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('users', 'isAdmin')) {
            Schema::table('users', function(Blueprint $table) {
                $table->boolean('isAdmin')->default(false);
            });
        }

        \Storage::extend('google', function($app, $config){
            $client = new Google_Client;

            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->setRedirectUri(config('services.google.redirect'));
            $client->setAccessType('offline');
            $client->setApprovalPrompt('force');
            $client->refreshToken(config('services.google.refresh_token'));
            $client->setScopes(explode(',', "email,profile,https://www.googleapis.com/auth/drive"));
            $client->setApprovalPrompt("force");
            $client->setAccessType("offline");

            $client->setDeveloperKey('AIzaSyBGXOW5Ko1SLQ2UELr0CEElWgvQ3BwkyQ0');
            $client->authenticate('4/wQHKBalufoaM5renZ1j9sj5ygELnJ0yfdIMzD8anajo7JPtyZKhYbHkZpymFB4TxJJxn5mffigRg3Tn8ur01KYY');

            //     $auth_url = $client->createAuthUrl();

            $token = $client->getAccessToken();
            $plus = new \Google_Service_Plus($client);
            $google_user = $plus->people->get('me');
            $id = $google_user['id'];

            $email = $google_user['emails'][0]['value'];
            $first_name = $google_user['name']['givenName'];
            $last_name = $google_user['name']['familyName'];

            session([
                'user' => [
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'token' => $token
                ]
            ]);

            $service = new \Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, config('services.google.folder_id'));
            return new \League\Flysystem\Filesystem($adapter);
        });
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
