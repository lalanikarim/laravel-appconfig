<?php

namespace Infinidigm\AppConfig\Models;

use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    //
    protected $primaryKey = "config";
    public $incrementing = false;
    public $timestamps = false;

    public static function RefreshConfig()
    {
        $configs = AppConfig::all();
        foreach ($configs as $config)
        {
            if(!is_null($config->value) && strlen(trim($config->value)) > 0)
            {
                config()->set([$config->config => $config->value]);
            }
        }
    }
}
