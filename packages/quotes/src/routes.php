<?php

use Quotes\Http\Controllers\QuotesController;

Route::get('/quotes', [QuotesController::class, 'index']);

Route::middleware('throttle:30,1')->group(function () {
    Route::get('/quotes', [QuotesController::class, 'index']);
});

Route::get('/quotes/random/{number}', [QuotesController::class, 'random']);
Route::get('/quotes/favorites', [QuotesController::class, 'favorites'])->middleware('auth');
Route::delete('/quotes/favorites/{quote}', [QuotesController::class, 'removeFavorite'])->middleware('auth');

// Agregar las nuevas rutas para manejar las citas favoritas

Route::middleware('auth')->group(function () {
    Route::post('/quotes/favorites/add', [QuotesController::class, 'addFavorite']);
    Route::get('/quotes/favorites', [QuotesController::class, 'favorites']);
    Route::delete('/quotes/favorites/{quote}', [QuotesController::class, 'removeFavorite']);
});

