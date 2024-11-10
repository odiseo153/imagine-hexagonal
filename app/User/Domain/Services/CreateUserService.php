<?php

namespace App\User\Domain\Services;

use App\User\Domain\Contracts\UserRepositoryPort;
use App\User\Domain\Entities\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUserService
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, ?string $email, string $password, string $username, string $role): User
    {
        return DB::transaction(function () use ($name, $email, $password, $username, $role) {
            $hashedPassword = Hash::make($password);
            $user = new User($name, $email, $hashedPassword, $username, $role);
            return $this->userRepository->create($user);
        });
    }
}
