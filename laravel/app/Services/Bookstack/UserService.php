<?php

namespace App\Services\BookStack;

class UserService
{
    protected BookStackClient $client;

    public function __construct(BookStackClient $client)
    {
        $this->client = $client;
    }

    // Verifica que tienes exactamente esta función
    public function createUser(array $userData)
    {
        return $this->client->post('users', $userData);
    }
}
