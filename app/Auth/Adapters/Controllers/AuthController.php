<?php

namespace App\Auth\Adapters\Controllers;

use App\Auth\Domain\Services\LoginService;
use App\Auth\Domain\Services\LogoutService;
use App\Auth\Http\Requests\LoginRequest;

class AuthController
{
    private LoginService $loginService;
    private LogoutService $logoutService;

    public function __construct(LoginService $loginService, LogoutService $logoutService)
    {
        $this->loginService = $loginService;
        $this->logoutService = $logoutService;
    }


    public function login(LoginRequest $request)
    {
        $user = $this->loginService->execute($request->username, $request->password);
        return response()->json($user, 200);
    }

    public function logout()
    {
        $this->logoutService->execute();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
