<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProductController;
use App\Models\Artist;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $artists = Artist::query()
        ->select(['id', 'name', 'image'])
        ->latest('id')
        ->get();

    return view('home', compact('artists'));
});

// Публичная страница артиста
Route::get('/artists/{artist}', function (Artist $artist) {
    $artist->load(['products' => function ($q) {
        $q->select(['id', 'artist_id', 'name', 'image', 'external_link'])->latest('id');
    }]);

    return view('artist', compact('artist'));
})->name('public.artist');

// Публичная страница товара не требуется — переход сразу по внешней ссылке

// API маршруты (с префиксом /api), чтобы не конфликтовать с публичными страницами
Route::prefix('api')->group(function () {
    Route::apiResource('artists', ArtistController::class);
    Route::apiResource('products', ProductController::class);
});
