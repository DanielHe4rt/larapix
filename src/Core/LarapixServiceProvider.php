<?php

namespace DanielHe4rt\Larapix\Core;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use function DanielHe4rt\Larapix\config;
use function DanielHe4rt\Larapix\config_path;

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
