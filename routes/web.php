<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [CafeController::class, 'hello']);
