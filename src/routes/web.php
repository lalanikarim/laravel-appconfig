<?php
use Infinidigm\AppConfig\Controllers\AppConfigController;
use Illuminate\Support\Facades\Route;
Route::get('/config',[AppConfigController::class,'index'])->name('all-configs');
Route::post('/config',[AppConfigController::class,'store'])->name('store-config');
Route::get('/config/delete/{appConfig}',[AppConfigController::class,'destroy'])->name('destroy-config');
