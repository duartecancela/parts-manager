<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PartController;
use App\Http\Controllers\API\StockInputController;
use App\Http\Controllers\API\StockOutputController;
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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('parts', PartController::class);
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('stock_inputs', StockInputController::class);
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('stock_outputs', StockOutputController::class);
});
