<?php

namespace App\Petition\Domain\Services;

use App\Petition\Domain\Contracts\PetitionRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPetitionsService
{
    private PetitionRepositoryPort $petitionRepository;

    public function __construct(PetitionRepositoryPort $petitionRepository)
    {
        $this->petitionRepository = $petitionRepository;
    }

    public function execute(int $perPage): LengthAwarePaginator
    {
        return $this->petitionRepository->getAll($perPage);
    }
}
