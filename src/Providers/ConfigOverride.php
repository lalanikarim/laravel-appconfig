<?php

namespace Infinidigm\AppConfig\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Infinidigm\AppConfig\Models\AppConfig;

class ConfigOverride extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (Schema::hasTable('app_configs')) {
            AppConfig::RefreshConfig();
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
