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
//Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth:sanctum','abilities:clients:list']);
//Route::post('/clients', [ClientController::class, 'store']);
//Route::get('/clients/{id}', [ClientController::class, 'show'])->middleware(['auth:sanctum','abilities:clients:list']);
//Route::put('/clients/{id}', [ClientController::class, 'update']);
//Route::delete('/clients/{id}', [ClientController::class, 'delete']);

// auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// Vamos Usar Variáveis de Ambiente no Postman foi guardado o token na variavel laravel_api_with_sanctum_environment
