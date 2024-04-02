<?php

namespace App\DataTransferObjects;

class QuoteCollectionDto
{
    public $quotes;
    public $total;
    public $skip;
    public $limit;

    public function __construct(array $data)
    {
        $this->total = $data['total'];
        $this->skip = $data['skip'];
        $this->limit = $data['limit'];
        $this->quotes = array_map(
            function ($item) {
                return new QuoteDto($item);
            },
            $data['quotes']
        );
    }
}
