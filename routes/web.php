<?php

use App\Http\Controllers\StockInputController;
use App\Http\Controllers\StockOutputController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;

Route::get('/', function () {
    return view('index');
})->name('home');

// parts routes
Route::get('/parts',[PartController::class, 'index'])->name('parts');
Route::get('/parts/create',[PartController::class, 'create'])->name('parts.create');
Route::post('/parts/store',[PartController::class, 'store'])->name('parts.store');
Route::get('/parts/show/{id}',[PartController::class, 'show'])->name('parts.show');
Route::get('/parts/edit/{id}',[PartController::class, 'edit'])->name('parts.edit');
Route::put('/parts/update/{id}',[PartController::class, 'update'])->name('parts.update');
Route::get('/parts/destroy/{id}',[PartController::class, 'destroy'])->name('parts.destroy');

//stock_inputs routes
Route::get('stock_inputs/create/{part_id}', [StockInputController::class, 'create'])->name('stock_inputs.create');
Route::post('stock_inputs/store', [StockInputController::class, 'store'])->name('stock_inputs.store');
Route::get('stock_inputs', [StockInputController::class, 'index'])->name('stock_inputs');

//stock_outputs routes
Route::get('stock_outputs/create/{part_id}', [StockOutputController::class, 'create'])->name('stock_outputs.create');
Route::post('stock_outputs/store', [StockOutputController::class, 'store'])->name('stock_outputs.store');
Route::get('stock_outputs', [StockoutputController::class, 'index'])->name('stock_outputs');

