<?php

namespace App\Clients\Integrations;

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
        return [
            'name' => 'Joaozinho',
            'email' => 'joaozinho@gmail.com',
            'phone' => '+551140028922'
        ];
    }
}