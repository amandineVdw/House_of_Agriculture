<?php

namespace App\Services\BookStack;

class BookService
{
    protected BookStackClient $client;

    public function __construct(BookStackClient $client)
    {
        $this->client = $client;
    }

    public function getAllBooks()
    {
        return $this->client->get('books');
    }

    public function getBookById($id)
    {
        return $this->client->get("books/{$id}");
    }
}
