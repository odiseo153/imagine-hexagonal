<?php

namespace App\User\Domain\Services;

use App\User\Domain\Contracts\UserRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListUsersService
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): LengthAwarePaginator
    {
        return $this->userRepository->getAll();
    }
}
