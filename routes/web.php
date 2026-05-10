<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show']);