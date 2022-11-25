<?php

namespace App\Http\Controllers;

use App\Services\FindIntegration;
use Illuminate\Http\JsonResponse;

class IntegrationsController extends Controller
{
    public function find(string $company, int $id, FindIntegration $action): JsonResponse
    {
        return response()->json($action->handle($company, $id));
    } 
}
