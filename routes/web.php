<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [CafeController::class, 'hello']);
Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{cafe}', [CafeController::class, 'show'])->name('cafes.show');