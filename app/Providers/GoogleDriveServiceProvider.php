<?php

namespace App\Providers;

use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\ServiceProvider;
use Google_Client;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        \Storage::extend('google', function($app, $config){
//            $client = new Google_Client;
//            $client->setClientId(config('services.google.client_id'));
//            $client->setClientSecret(config('services.google.client_secret'));
//            $client->setRedirectUri(config('services.google.redirect'));
//            $client->setAccessType('offline');
//            $client->setApprovalPrompt('force');
//            $client->refreshToken(config('services.google.refresh_token'));
//
//            $service = new \Google_Service_Drive($client);
//            $adapter = new GoogleDriveAdapter($service, config('services.google.folder_id'));
//            return new \League\Flysystem\Filesystem($adapter);
//        });
    }
}
