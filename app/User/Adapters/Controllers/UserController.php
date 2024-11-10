<?php

namespace App\User\Adapters\Controllers;

use App\User\Domain\Services\CreateUserService;
use App\User\Http\Requests\CreateUserRequest;
use App\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController
{
    private CreateUserService $createUserService;

    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = $this->createUserService->execute($request->name, $request->email, $request->password, $request->username, $request->role);
        return response()->json(new UserResource($user), 201);
    }
}
