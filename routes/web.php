<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// API маршруты для артистов
Route::apiResource('artists', ArtistController::class);

// API маршруты для товаров
Route::apiResource('products', ProductController::class);
