<?php

use Quotes\Http\Controllers\QuotesController;

Route::get('/quotes', [QuotesController::class, 'index']);

Route::middleware('throttle:30,1')->group(
    function () {
        Route::get('/quotes/random/{number}', [QuotesController::class, 'random']);
    }
);

Route::middleware('auth')->group(
    function () {
        Route::get('/quotes/favorites', [QuotesController::class, 'favorites']);
        Route::delete('/quotes/favorites/{quote}', [QuotesController::class, 'removeFavorite']);
        Route::post('/quotes/favorites/add', [QuotesController::class, 'addFavorite']);
    }
);
