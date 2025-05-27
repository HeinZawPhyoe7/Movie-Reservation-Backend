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
});
