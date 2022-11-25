<?php

namespace App\Http\Controllers;

use App\Services\FindIntegration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IntegrationsController extends Controller
{
    public function find(Request $request, string $company, FindIntegration $action): JsonResponse
    {
        return response()->json($action->handle($company));
    } 
}
