<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\ApiResponse;

Route::get('/status', function() {
    return ApiResponse::success('API is running');
})->middleware('auth:sanctum');

Route::apiResource('/clients', ClientController::class)->middleware('auth:sanctum');

// auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// Vamos Usar Variáveis de Ambiente no Postman foi guardado o token na variavel laravel_api_with_sanctum_environment
