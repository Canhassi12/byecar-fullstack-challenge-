<?php

use App\Http\Controllers\IntegrationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('integration.token')
    ->get('/integrations/{company}/users/{id}', [IntegrationsController::class, 'find'])->name('integrations.find');
