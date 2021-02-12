<?php

namespace Infinidigm\AppConfig;

use Illuminate\Support\ServiceProvider;

class AppConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->make('Infinidigm\AppConfig\AppConfigController'); 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //$this->app->make('Infinidigm\AppConfig\Controllers\AppConfigController');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views','appconfig');
        $this->publishes([
            __DIR__.'/resources/views'=>resource_path('views/appconfig')
        ]);
    }
}
