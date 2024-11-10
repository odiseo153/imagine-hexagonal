<?php

namespace App\User\Domain\Contracts;

use App\User\Domain\Entities\User;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryPort
{
    public function create(User $user): User;
    public function getAll(): LengthAwarePaginator;
}
