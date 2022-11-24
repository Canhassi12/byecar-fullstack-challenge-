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
        $tokenFoda = 'he4rtDevs1337';

        if(!$request->hasHeader('token')) {
            return response()->json(['message' => 'you need a token to access'], Response::HTTP_UNAUTHORIZED);
        }

        if($request->header('token') != $tokenFoda) {
            return response()->json(['message' => 'that token are invalid'], Response::HTTP_UNAUTHORIZED);
        }

        return $this->client->findById(2);
    } 
}
