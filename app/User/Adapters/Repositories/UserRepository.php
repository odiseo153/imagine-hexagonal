<?php

namespace App\User\Adapters\Repositories;

use App\User\Domain\Contracts\UserRepositoryPort;
use App\User\Domain\Entities\User;
use App\Models\User as UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepository implements UserRepositoryPort
{
    public function create(User $user): User
    {
        $userModel = UserModel::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'username' => $user->username,
            'role' => $user->role
        ]);

        return new User($userModel->name, $userModel->email, $userModel->password, $userModel->username, $userModel->role);
    }

    public function getAll(): LengthAwarePaginator
    {
        return QueryBuilder::for(UserModel::class)
            ->allowedFilters(['name', 'email'])
            ->allowedSorts(['name', 'email', 'created_at'])
            ->paginate();
    }
}
