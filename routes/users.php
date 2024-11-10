<?php

use App\User\Adapters\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::middleware('auth:sanctum')->group(function () {});
