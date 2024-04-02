<?php

use Quotes\Http\Controllers\QuotesController;

Route::get('/quotes', [QuotesController::class, 'index']);

Route::middleware('throttle:30,1')->group(function () {
    Route::get('/quotes', [QuotesController::class, 'index']);
});

Route::get('/quotes/random/{number}', [QuotesController::class, 'random']);
Route::get('/quotes/favorites', [QuotesController::class, 'favorites'])->middleware('auth');
Route::delete('/quotes/favorites/{quote}', [QuotesController::class, 'removeFavorite'])->middleware('auth');
