<?php

namespace App\Services\BookStack;

use Illuminate\Support\Facades\Http;

class BookStackClient
{
    protected string $baseUrl;
    protected string $tokenId;
    protected string $token;
    protected string $tokenSecret;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.bookstack.url'), '/');
        $this->tokenId      = config('services.bookstack.token_id');
        $this->tokenSecret  = config('services.bookstack.token_secret');

        // Initialise la propriété $token avec tokenId et tokenSecret - AVDW 24/04/25
        $this->token = $this->tokenId . ':' . $this->tokenSecret;
    }

    protected function getHeaders(): array
    {
        return [
            'Authorization' => 'Token ' . $this->token,  // Utiliser $this->token ici -AVDW 24/04/25
            'Accept' => 'application/json',
        ];
    }

    public function get(string $endpoint)
    {
        return Http::withHeaders($this->getHeaders())
            ->get("{$this->baseUrl}{$endpoint}")
            ->json();
    }

    public function post(string $endpoint, array $data)
    {
        return Http::withHeaders($this->getHeaders())
            ->post("{$this->baseUrl}{$endpoint}", $data)
            ->json();
    }

    public function put(string $endpoint, array $data)
    {
        return Http::withHeaders($this->getHeaders())
            ->put("{$this->baseUrl}{$endpoint}", $data)
            ->json();
    }

    public function delete(string $endpoint)
    {
        return Http::withHeaders($this->getHeaders())
            ->delete("{$this->baseUrl}{$endpoint}")
            ->json();
    }
}