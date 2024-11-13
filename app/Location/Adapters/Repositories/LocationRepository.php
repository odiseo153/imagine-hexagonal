<?php

namespace App\Location\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Location\Domain\Contracts\LocationRepositoryPort;
use App\Location\Domain\Entities\Location;
use App\Models\Location as LocationModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LocationRepository extends BaseRepository implements LocationRepositoryPort
{
    public function __construct()
    {
        parent::__construct(LocationModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['user', 'userInCharge']): LengthAwarePaginator
    {
        return  parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Location $location): Location
    {
        $locationModel = LocationModel::create([
            'name' => $location->name,
            'type' => $location->type,
            'user_id' => $location->user_id,
            'user_in_charge_id' => $location->user_in_charge_id,
        ]);

        return new Location($locationModel->toArray() + [
            'user' => $locationModel->user->toArray(),
            'userInCharge' => $locationModel->userInCharge->toArray()
        ]);
    }

    public function findById(string $id): Location
    {
        $locationModel = LocationModel::findOrFail($id);

        return new Location($locationModel->toArray() + [
            'user' => $locationModel->user->toArray(),
            'userInCharge' => $locationModel->userInCharge->toArray()
        ]);
    }
}
