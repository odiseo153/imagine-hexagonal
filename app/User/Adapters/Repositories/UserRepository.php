<?php

namespace App\User\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\User\Domain\Contracts\UserRepositoryPort;
use App\User\Domain\Entities\User;
use App\Models\User as UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class UserRepository extends BaseRepository implements UserRepositoryPort
{
    public function __construct()
    {
        parent::__construct(UserModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = []): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(User $user): User
    {
        $userModel = UserModel::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'username' => $user->username,
            'role' => $user->role,
        ]);

        return new User($userModel->toArray());
    }

    public function findById(string $id): User
    {
        $userModel = UserModel::findOrFail($id);
        return new User($userModel->toArray());
    }

    public function update(string $id, array $data): User
    {
        $userModel = UserModel::findOrFail($id);
        $userModel->update($data);
        return new User($userModel->toArray());
    }
}
