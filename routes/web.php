<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\ProfileController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/list', [MovieController::class, 'index']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/movie/{id}', [MovieController::class, 'show']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/movie/create', [MovieController::class, 'create'])->name('admin.movie.create');
    Route::post('/admin/movie/store', [MovieController::class, 'store'])->name('admin.movie.store');
});

Route::delete('/movie/{id}',
    [MovieController::class, 'destroy']
);
Route::put('/movie/{id}',
    [MovieController::class, 'update']
);

Route::post('/reviews', [ReviewController::class, 'store'])
->middleware('auth')
->name('reviews.store');

Route::get('/community', [ReviewController::class, 'community'])->name('community');
Route::post('/watchlist/add/{movie}', [WatchlistController::class, 'add'])->name('watchlist.add');
Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::post('/movie/fetch', [MovieController::class, 'store']);
Route::get('/edit', [HomeController::class, 'edit'])->name('edit');

Route::put('/update', [HomeController::class, 'update'])->name('update');
Route::get('/profile/{id}', [HomeController::class, 'showProfile'])->name('profile');
Route::post('/like/{movie}', [MovieController::class, 'like'])->name('movie.like');