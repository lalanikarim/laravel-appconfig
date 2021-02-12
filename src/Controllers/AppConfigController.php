<?php

namespace Infinidigm\AppConfig\Controllers;

use Infinidigm\AppConfig\Models\AppConfig;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AppConfigController extends Controller
{
    //
    public function index()
    {
        $appConfigs = AppConfig::all();
        return view('appconfig::appconfig.index')->with(compact('appConfigs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'config' => 'string|required|max:191',
            'value' => 'string|nullable'
        ]);
        $config = $request->input('config');
        $value = $request->input('value');

        $appConfig = AppConfig::find($config);

        if(is_null($appConfig))
        {
            $appConfig = new AppConfig();
            $appConfig->config = $config;
        }

        $appConfig->value = $value;

        $appConfig->save();

        return redirect(route('all-configs'));
    }

    public function destroy(AppConfig $config)
    {
      $config->delete();
      return redirect(route('all-configs'));
    }
}
