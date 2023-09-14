<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\API\SettingController;
use Illuminate\Support\Facades\Route;




Route::get('/setting/index', [SettingController::class, 'index'])->name('setting.index');

Route::prefix('api/')->group(function(){

    Route::post('login',[RegisterController::class,'login'])->name('login.api');
    Route::post('register',[RegisterController::class,'register'])->name('register.api');

});



