<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyIntegrationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->hasHeader('token')) {
            return response()->json(['message' => 'you need a token to access'], Response::HTTP_UNAUTHORIZED);
        }

        if($request->header('token') != env('INTEGRATIONS_TOKEN')) {
            return response()->json(['message' => 'that token are invalid'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
