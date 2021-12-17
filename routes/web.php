<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartsController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/parts',[PartsController::class, 'index'])->name('parts');
Route::get('/parts/create',[PartsController::class, 'create'])->name('parts.create');
Route::post('/parts/store',[PartsController::class, 'store'])->name('parts.store');
Route::get('/parts/show/{id}',[PartsController::class, 'show'])->name('parts.show');
Route::get('/parts/edit/{id}',[PartsController::class, 'edit'])->name('parts.edit');
Route::put('/parts/update/{id}',[PartsController::class, 'update'])->name('parts.update');
Route::get('/parts/destroy/{id}',[PartsController::class, 'destroy'])->name('parts.destroy');
