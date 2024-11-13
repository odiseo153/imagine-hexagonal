<?php

namespace App\Petition\Domain\Services;

use App\Petition\Domain\Contracts\PetitionRepositoryPort;
use App\Petition\Domain\Entities\Petition;

class CreatePetitionService
{
    private PetitionRepositoryPort $petitionRepository;

    public function __construct(PetitionRepositoryPort $petitionRepository)
    {
        $this->petitionRepository = $petitionRepository;
    }

    public function execute(array $data): Petition
    {
        $location = new Petition($data);
        return $this->petitionRepository->create($location);
    }
}
