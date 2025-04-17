<?php

namespace App\Services\BookStack;

class PageService
{
    protected BookStackClient $client;

    public function __construct(BookStackClient $client)
    {
        $this->client = $client;
    }

    public function getAllPages()
    {
        return $this->client->get('pages');
    }

    public function getPageById($id)
    {
        return $this->client->get("pages/{$id}");
    }

    public function createPage(array $data)
    {
        return $this->client->post("pages", $data);
    }
}
