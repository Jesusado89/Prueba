<?php

namespace App\DataTransferObjects;

class QuoteDto
{
    public $id;
    public $quote;
    public $author;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->quote = $data['quote'];
        $this->author = $data['author'];
    }
}
