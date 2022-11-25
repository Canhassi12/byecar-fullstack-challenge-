<?php

namespace App\Services;

use App\Clients\Integrations\IntegrationClientInterface;
use App\Clients\Integrations\LocalizaClient;
use App\Clients\Integrations\MovidaClient;

class FindIntegration {

    public function handle(string $company): array
    {
        $client = $this->getClient($company);

        $user = $client->findById(1);

        return $user;
    }

    private function getClient($company): IntegrationClientInterface
    {
        return match($company) {
            'movida'   => new MovidaClient,
            'localiza' => new LocalizaClient
        };
    }
}
