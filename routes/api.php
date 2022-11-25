<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/cliente', [App\Http\Controllers\ClienteController::class, 'store']);

Route::put('/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'update']);

Route::delete('/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'destroy']);

Route::get('/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'getById']);

Route::get('/consulta/final-placa/{placa}', [App\Http\Controllers\ClienteController::class, 'getByPlaca']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
