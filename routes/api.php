<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('register/{id}', [App\Http\Controllers\Api\RegistrationController::class, 'register']);
    Route::apiResource('registers', App\Http\Controllers\Api\RegistrationController::class);
    Route::apiResource('events', App\Http\Controllers\Api\EventController::class);

    Route::post('/logout', [App\Http\Controllers\Api\EventController::class, 'logout']);
    
});

Route::apiResource('users', App\Http\Controllers\Api\UserController::class);