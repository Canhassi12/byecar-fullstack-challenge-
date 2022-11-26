<?php

namespace App\Services;

use App\Clients\Integrations\IntegrationClientInterface;
use App\Clients\Integrations\LocalizaClient;
use App\Clients\Integrations\MovidaClient;
use App\Exceptions\InvalidClientException;
use Exception;

class FindIntegration {

    public function handle(string $company, int $id): array
    {
        $client = $this->getClient($company);
        
        $user = $client->findById($id);

        return $user;
    }

    private function getClient($company): IntegrationClientInterface
    {
        $client = match($company) {
            'movida'   => new MovidaClient,
            'localiza' => new LocalizaClient,
            default => null
        };  
        
        if(!$client instanceof (IntegrationClientInterface::class)) {
            throw InvalidClientException::invalidName();
        }

        return $client;
    }
}