<?php

namespace Tuto1902\Five9Client;

use Illuminate\Support\ServiceProvider;

class Five9ClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/five9.php' => config_path('five9.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Five9Client', 'Tuto1902\Five9Client\Services\Five9Client');
    }
}
