<?php

namespace App\Petition\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Petition\Domain\Services\CreatePetitionService;
use App\Petition\Http\Requests\CreatePetitionRequest;
use App\Petition\Http\Resources\PetitionResource;

class PetitionController extends BaseController
{
    private CreatePetitionService $createPetitionService;

    public function __construct(CreatePetitionService $createPetitionService)
    {
        $this->createPetitionService = $createPetitionService;
    }
    public function store(CreatePetitionRequest $request)
    {
        $data = $request->validated();
        $petition = $this->createPetitionService->execute($data);
        return response()->json(new PetitionResource($petition), 201);
    }
}
