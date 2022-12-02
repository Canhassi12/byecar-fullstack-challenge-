<?php

namespace App\Clients\Integrations;

use App\Exceptions\InvalidClientIdException;
use GuzzleHttp\Client;

class LocalizaClient implements IntegrationClientInterface
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com'
        ]);
    }

    public function findById(int $id): array
    {
        $response = $this->client->get('/users');

        $users = json_decode($response->getBody(), true);

        if(empty($users[$id])) {
            throw InvalidClientIdException::invalidId();
        }
        
        return [
            "name"  => $users[$id]['name'],
            "email" => $users[$id]['email'],
            "phone" => $users[$id]['phone']
        ];
    }
}