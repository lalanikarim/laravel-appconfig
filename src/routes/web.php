<?php
use Infinidigm\AppConfig\Controllers\AppConfigController;
use Infinidigm\AppConfig\Models\AppConfig;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function() {
  Route::get('/config',[AppConfigController::class,'index'])->name('all-configs');
  Route::post('/config',[AppConfigController::class,'store'])->name('store-config');
  Route::get('/config/delete/{config}',[AppConfigController::class,'destroy'])->name('destroy-config');
});
