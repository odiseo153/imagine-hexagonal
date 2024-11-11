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

    public function create(User $user): User
    {
        $userModel = UserModel::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ]);

        return new User($userModel->name, $userModel->email, $userModel->password,  $userModel->username, $userModel->role);
    }

    public function getAll(int $perPage = 15, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = []): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }
}
