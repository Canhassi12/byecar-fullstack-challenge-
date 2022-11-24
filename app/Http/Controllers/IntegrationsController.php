<?php

namespace App\Http\Controllers;

use App\Clients\Integrations\LocalizaClient;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IntegrationsController extends Controller
{
    private LocalizaClient $client;

    public function __construct(LocalizaClient $client)
    {
        $this->client = $client;
    }

    public function find(Request $request, $company) 
    {
        return $this->client->findById(2);
    } 
}
