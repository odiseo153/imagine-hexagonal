<?php

namespace App\Petition\Domain\Services;

use App\Petition\Domain\Contracts\PetitionRepositoryPort;
use App\Petition\Domain\Entities\Petition;

class CancelPetitionByIdService
{
    private PetitionRepositoryPort $petitionRepository;

    public function __construct(PetitionRepositoryPort $petitionRepository)
    {
        $this->petitionRepository = $petitionRepository;
    }

    public function execute(string $id): Petition
    {
        return $this->petitionRepository->cancelById($id);
    }
}
