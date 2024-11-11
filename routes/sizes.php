<?php

use App\Size\Adapters\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('sizes', SizeController::class);
});
