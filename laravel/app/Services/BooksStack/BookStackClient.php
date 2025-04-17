<?php

namespace App\Services\BookStack;

use Illuminate\Support\Facades\Http;

class BookStackClient
{
    protected string $baseUrl;
    protected string $tokenId;
    protected string $tokenSecret;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('BOOKSTACK_URL'), '/');
        $this->tokenId = env('BOOKSTACK_API_TOKEN_ID');
        $this->tokenSecret = env('BOOKSTACK_API_TOKEN_SECRET');
    }

    protected function request(string $method, string $uri, array $data = [])
    {
        $url = "{$this->baseUrl}/api/{$uri}";

        $response = Http::withHeaders([
            'Authorization' => "Token {$this->tokenId}:{$this->tokenSecret}",
            'Accept' => 'application/json',
        ])->{$method}($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception("BookStack API error ({$response->status()}): {$response->body()}");
    }

    public function get(string $uri, array $params = [])
    {
        return $this->request('get', $uri, $params);
    }

    public function post(string $uri, array $data)
    {
        return $this->request('post', $uri, $data);
    }

    public function put(string $uri, array $data)
    {
        return $this->request('put', $uri, $data);
    }

    public function delete(string $uri)
    {
        return $this->request('delete', $uri);
    }
}
