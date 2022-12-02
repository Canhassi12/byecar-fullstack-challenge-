<?php

namespace App\Clients\Integrations;

interface IntegrationClientInterface {

    public function findById(int $id): array;
}