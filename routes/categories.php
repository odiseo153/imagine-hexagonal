<?php

use App\Category\Adapters\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('categories/name/{name}', [CategoryController::class, 'showCategoryByName']);
    Route::apiResource('categories', CategoryController::class);
});
