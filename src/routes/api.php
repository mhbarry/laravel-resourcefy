<?php

Route::group(['prefix' => config('laravelresourcefy.prefix')], function () {

    Route::get('referentiels', [\Mhbarry\LaravelResourcefy\Controllers\Api\ReferentielsController::class, 'index']);
    Route::get('cruds', [\Mhbarry\LaravelResourcefy\Controllers\Api\CrudsController::class, 'index']);
    Route::post('cruds', [\Mhbarry\LaravelResourcefy\Controllers\Api\CrudsController::class, 'store']);
    Route::get('cruds/{id}', [\Mhbarry\LaravelResourcefy\Controllers\Api\CrudsController::class, 'show']);
    Route::patch('cruds/{id}', [\Mhbarry\LaravelResourcefy\Controllers\Api\CrudsController::class, 'update']);
    Route::delete('cruds/{id}', [\Mhbarry\LaravelResourcefy\Controllers\Api\CrudsController::class, 'delete']);
    Route::get('login', [\Mhbarry\LaravelResourcefy\Controllers\Api\Auth\LoginController::class, 'login']);
    Route::get('register', [\Mhbarry\LaravelResourcefy\Controllers\Api\Auth\RegisterController::class, 'register']);

});


