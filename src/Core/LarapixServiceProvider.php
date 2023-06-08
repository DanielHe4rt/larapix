<?php

namespace DanielHe4rt\Larapix\Core;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class LarapixServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/larapix.php' => config_path('larapix.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->bind('larapix', function () {
            $client = new Client([
                'base_uri' => config('larapix.base_url'),
                'headers' => [
                    'Authorization' => config('larapix.app_id')
                ]
            ]);

            return new LarapixService($client);
        });
    }
}
