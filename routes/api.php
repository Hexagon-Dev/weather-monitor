<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);

        Route::get('email-verification/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
            ->middleware(['throttle:6,1'])
            ->name('verification.verify');

        Route::post('forgot-password/send', [AuthController::class, 'sendResetPasswordEmail'])
            ->name('password.email');

        Route::get('forgot-password/verify', [AuthController::class, 'resetPassword'])
            ->name('password.email');
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('change-password', [AuthController::class, 'changePassword']);

            Route::post('email-verification/send', [AuthController::class, 'sendVerificationEmail'])
                ->middleware(['throttle:6,1'])
                ->name('verification.send');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('me', [UserController::class, 'getMe']);
            Route::put('me', [UserController::class, 'updateMe']);
        });
    });

    Route::group(['prefix' => 'weather'], function () {
        Route::get('{location}', [WeatherController::class, 'get']);
    });

    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', [LocationController::class, 'index']);
		Route::put('/{location/favourite', [LocationController::class, 'toggleFavourite']);
    });
});
