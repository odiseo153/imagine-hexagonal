<?php

namespace App\User\Domain\Contracts;

use App\User\Domain\Entities\User;

interface UserRepositoryPort
{
    public function create(User $user): User;
}
