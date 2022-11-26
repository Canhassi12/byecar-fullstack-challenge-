<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidClientException;
use App\Exceptions\InvalidClientIdException;
use App\Services\FindIntegration;
use Exception;
use Illuminate\Http\JsonResponse;

class IntegrationsController extends Controller
{
    public function find(string $company, int $id, FindIntegration $action): JsonResponse
    {
        try {
            return response()->json($action->handle($company, $id));
        } catch(InvalidClientException|InvalidClientIdException $e) {
            return response()->json(["message" => $e->getMessage()], $e->getCode());
        }
    } 
}
