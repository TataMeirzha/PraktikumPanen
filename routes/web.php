<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanenController; // Import Controller

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-panen', [PanenController::class, 'index']);

Route::get('/data-panen', [PanenController::class, 'index']);
Route::get('/data-panen/create', [PanenController::class, 'create']);
Route::post('/data-panen/store', [PanenController::class, 'store']);