<?php

use App\Http\Controllers\Admin\CafeController as AdminCafeController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cafes');

Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{cafe}', [CafeController::class, 'show'])->name('cafes.show');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cafes', AdminCafeController::class)->except(['show']);
});