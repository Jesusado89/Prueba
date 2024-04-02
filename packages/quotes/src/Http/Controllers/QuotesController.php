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


        return response()->json($specificQuote);
    }

    public function favorites()
    {
        $favoriteQuotes = $this->quoteManager->getFavoriteQuotes();
        return response()->json($favoriteQuotes);
    }

    public function addFavorite(Request $request)
    {
        $quoteId = $request->input('quote_id');
        $this->quoteManager->addFavoriteQuote($quoteId);
        return response()->json(['message' => 'Quote added to favorites']);
    }

    public function removeFavorite(Request $request)
    {
        $quoteId = $request->input('quote_id');
        $this->quoteManager->removeFavoriteQuote($quoteId);
        return response()->json(['message' => 'Quote removed from favorites']);
    }
}
