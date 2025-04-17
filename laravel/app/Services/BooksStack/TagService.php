<?php

namespace App\Services\BookStack;

class TagService
{
    protected BookStackClient $client;

    public function __construct(BookStackClient $client)
    {
        $this->client = $client;
    }

    public function getTagsForPage($pageId)
    {
        return $this->client->get("pages/{$pageId}/tags");
    }

    public function addTagsToPage($pageId, array $tags)
    {
        return $this->client->put("pages/{$pageId}/tags", [
            'tags' => $tags
        ]);
    }
}
