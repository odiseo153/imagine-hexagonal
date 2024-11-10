<?php

namespace App\User\Adapters\Controllers;

use App\User\Domain\Services\CreateUserService;
use App\User\Domain\Services\ListUsersService;
use App\User\Http\Requests\CreateUserRequest;
use App\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController
{
    private CreateUserService $createUserService;
    private ListUsersService $listUsersService;

    public function __construct(CreateUserService $createUserService, ListUsersService $listUsersService)
    {
        $this->createUserService = $createUserService;
        $this->listUsersService = $listUsersService;
    }

    public function index()
    {
        $users = $this->listUsersService->execute();
        return UserResource::collection($users);
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = $this->createUserService->execute($request->name, $request->email, $request->password, $request->username, $request->role);
        return response()->json(new UserResource($user), 201);
    }
}
