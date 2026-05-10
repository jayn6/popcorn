<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::get('/admin/movie/create',
[MovieController::class,'create']);

Route::post('/admin/movie/store',
[MovieController::class,'store']);