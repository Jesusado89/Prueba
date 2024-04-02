<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class QuoteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'quoteManager';
    }
}
