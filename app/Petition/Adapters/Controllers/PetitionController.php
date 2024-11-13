<?php

namespace App\Petition\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Petition\Domain\Services\CancelPetitionByIdService;
use App\Petition\Domain\Services\CreatePetitionService;
use App\Petition\Domain\Services\FindByIdPetitionService;
use App\Petition\Domain\Services\ListPetitionsService;
use App\Petition\Http\Requests\CreatePetitionRequest;
use App\Petition\Http\Resources\PetitionResource;
use Illuminate\Http\Request;

class PetitionController extends BaseController
{
    private CreatePetitionService $createPetitionService;
    private ListPetitionsService $listPetitionsService;
    private FindByIdPetitionService $findByIdPetitionService;
    private CancelPetitionByIdService $cancelPetitionByIdService;

    public function __construct(
        CreatePetitionService $createPetitionService,
        ListPetitionsService $listPetitionsService,
        FindByIdPetitionService $findByIdPetitionService,
        CancelPetitionByIdService $cancelPetitionByIdService
    ) {
        $this->createPetitionService = $createPetitionService;
        $this->listPetitionsService = $listPetitionsService;
        $this->findByIdPetitionService = $findByIdPetitionService;
        $this->cancelPetitionByIdService = $cancelPetitionByIdService;
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

    public function show($id)
    {
        $petition = $this->findByIdPetitionService->execute($id);
        return new PetitionResource($petition);
    }

    public function cancel($id)
    {
        $petition = $this->cancelPetitionByIdService->execute($id);
        return new PetitionResource($petition);
    }
}
