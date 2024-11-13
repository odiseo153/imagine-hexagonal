<?php

namespace App\Location\Adapters\Controllers;

use App\Location\Http\Resources\LocationResource;
use App\Core\Controllers\BaseController;
use App\Location\Domain\Services\CreateLocationService;
use App\Location\Http\Requests\CreateLocationRequest;

class LocationController extends BaseController
{
    private CreateLocationService $createLocationService;

    public function __construct(CreateLocationService $createLocationService)
    {
        $this->createLocationService = $createLocationService;
    }

    public function store(CreateLocationRequest $request)
    {
        $data = $request->validated();
        $location = $this->createLocationService->execute($data);
        return response()->json(new LocationResource($location), 201);
    }
}
