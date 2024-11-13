<?php

namespace App\Petition\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Petition\Domain\Services\CreatePetitionService;
use App\Petition\Domain\Services\ListPetitionsService;
use App\Petition\Http\Requests\CreatePetitionRequest;
use App\Petition\Http\Resources\PetitionResource;
use Illuminate\Http\Request;

class PetitionController extends BaseController
{
    private CreatePetitionService $createPetitionService;
    private ListPetitionsService $listPetitionsService;

    public function __construct(
        CreatePetitionService $createPetitionService,
        ListPetitionsService $listPetitionsService
    ) {
        $this->createPetitionService = $createPetitionService;
        $this->listPetitionsService = $listPetitionsService;
    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $petitions = $this->listPetitionsService->execute($perPage);
        return PetitionResource::collection($petitions);
    }

    public function store(CreatePetitionRequest $request)
    {
        $data = $request->validated();
        $petition = $this->createPetitionService->execute($data);
        return response()->json(new PetitionResource($petition), 201);
    }
}
