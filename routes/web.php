<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})
->middleware('auth')->name('home');
Route::get('/', [HomeController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::get('/admin/movie/create',
[MovieController::class,'create']);

Route::post('/admin/movie/store',
[MovieController::class,'store']);