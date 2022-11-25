<?php

namespace App\Clients\Integrations;

use GuzzleHttp\Client;

class MovidaClient implements IntegrationClientInterface
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
        
        return [
            "name"  => $users[$id]['name'],
            "email" => $users[$id]['email'],
            "phone" => $users[$id]['phone']
        ];
    }
}