<?php

namespace Quotes\Http\Controllers;

use App\Services\QuoteManager;

class QuotesController
{
    public function index()
    {
        $quoteManager = new QuoteManager();
        $quotesCollection = $quoteManager->getAllQuotes();


        return response()->json($quotesCollection);
    }

    public function random()
    {
        $quoteManager = new QuoteManager();
        $specificQuote = $quoteManager->getQuoteById(1);

        echo $specificQuote->author . ' says: "' . $specificQuote->quote . '"';

        return response()->json($specificQuote);
    }

    public function favorites()
    {
        return "QuotesController.favorites";
    }

    public function removeFavorite()
    {
        return "QuotesController.removeFavorite";
    }
}
