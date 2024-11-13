<?php

use App\Location\Adapters\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('locations/name/{name}', [LocationController::class, 'showByName']);
    Route::apiResource('locations', LocationController::class);
});
