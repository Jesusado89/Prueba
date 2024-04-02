<?php

namespace Quotes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class QuotesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
            ],
            'quotes-config'
        );

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}
