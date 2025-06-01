<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDetailController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    //Movies
    Route::post('/admin/movie/store', [MovieController::class, 'movie_store'])->name('movie_store');
    Route::get('/movie/getall', [MovieController::class, 'getall'])->name('movie_getall');
    Route::get('/movie/show/{id}', [MovieController::class, 'show'])->name('movie_show');

    //Movie Details
    Route::post('/admin/movie/detail/store', [MovieDetailController::class, 'movie_detail_store'])->name('movie_detail_store');
    Route::get('/movie/detail/getall', [MovieDetailController::class, 'movie_detail_getall'])->name('movie_detail_getall');
});
