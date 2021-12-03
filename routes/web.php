<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/parts',[PartsController::class, 'index'])->name('parts');
