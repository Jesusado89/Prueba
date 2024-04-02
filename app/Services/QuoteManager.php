<?php

namespace App\Services;

use App\DataTransferObjects\QuoteDto;
use App\DataTransferObjects\QuoteCollectionDto;
use Illuminate\Support\Facades\Http;

class QuoteManager
{
    protected $baseUrl = 'https://dummyjson.com/quotes';

    public function getAllQuotes($limit = 30, $skip = 0)
    {
        $response = Http::get("{$this->baseUrl}?limit={$limit}&skip={$skip}");

        if ($response->successful()) {
            return new QuoteCollectionDto($response->json());
        }

        // Manejar error de respuesta aquí
    }

    public function getQuoteById($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return new QuoteDto($response->json());
        }

        // Manejar error de respuesta aquí
    }
}
