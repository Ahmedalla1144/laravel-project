<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::prefix('posts')
    ->controller(PostController::class)
    ->group(function () {

        Route::get('/pending','pending');

        Route::get('/canceled','canceled');
    });

Route::apiResource('posts', PostController::class);
