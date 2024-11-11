<?php

use App\Size\Adapters\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('sizes/name/{name}', [SizeController::class, 'showSizeByName']);
    Route::apiResource('sizes', SizeController::class);
});
