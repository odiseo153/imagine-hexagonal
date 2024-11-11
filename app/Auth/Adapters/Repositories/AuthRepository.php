<?php

namespace App\Auth\Adapters\Repositories;

use App\Auth\Domain\Contracts\AuthRepositoryPort;
use App\Auth\Domain\Entities\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryPort
{
    public function login(User $user): array | null
    {
        if (Auth::attempt(['username' => $user->username, 'password' => $user->password])) {
            $authenticatedUser = Auth::user();
            $token = $authenticatedUser->createToken('token', ['*'], now()->addHours(15))->plainTextToken;
            return [
                'token' => $token,
                'username' => $authenticatedUser->username,
                'name' => $authenticatedUser->name,
            ];
        }

        return null;
    }

    public function logout(): void
    {
        Auth::user()->tokens()->delete();
    }
}
