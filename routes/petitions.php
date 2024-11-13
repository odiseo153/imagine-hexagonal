<?php

use App\Petition\Adapters\Controllers\PetitionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('petitions', PetitionController::class);
    Route::patch('petitions/{id}/cancel', [PetitionController::class,'cancel']);

});
