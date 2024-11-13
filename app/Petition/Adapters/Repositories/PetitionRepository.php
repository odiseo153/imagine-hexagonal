<?php

namespace App\Petition\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Petition\Domain\Contracts\PetitionRepositoryPort;
use App\Petition\Domain\Entities\Petition;
use App\Models\Petition as PetitionModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PetitionRepository extends BaseRepository implements PetitionRepositoryPort
{

    public function __construct()
    {
        parent::__construct(PetitionModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['user']): LengthAwarePaginator
    {
        return  parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Petition $petition): Petition
    {
        $petitionModel = PetitionModel::create([
            'note' => $petition->note,
            'user_id' => $petition->user_id,
            'from_location_id' => $petition->from_location_id,
            'to_location_id' => $petition->to_location_id,
        ]);
        return new Petition($petitionModel->toArray());
    }

    public function findById(string $id): Petition
    {
        $petitionModel = PetitionModel::findOrFail($id);
        return new Petition($petitionModel->toArray());
    }
}
