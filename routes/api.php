<?php

use App\Http\Controllers\MovieDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    //Movies
    Route::post('/admin/store', [MovieDetailController::class, 'store'])->name('admin_store');
    Route::get('/detail/getall', [MovieDetailController::class, 'getall'])->name('detail_getall');
    Route::get('/detail/show/{id}', [MovieDetailController::class, 'show'])->name('detail_show');
});
