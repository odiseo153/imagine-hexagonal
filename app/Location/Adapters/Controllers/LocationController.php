<?php

namespace App\Location\Adapters\Controllers;

use App\Location\Http\Resources\LocationResource;
use App\Core\Controllers\BaseController;
use App\Location\Domain\Services\CreateLocationService;
use App\Location\Domain\Services\ListLocationsService;
use App\Location\Http\Requests\CreateLocationRequest;
use Illuminate\Http\Request;


class LocationController extends BaseController
{
    private CreateLocationService $createLocationService;
    private ListLocationsService $listLocationsService;

    public function __construct(CreateLocationService $createLocationService, ListLocationsService $listLocationsService)
    {
        $this->createLocationService = $createLocationService;
        $this->listLocationsService = $listLocationsService;
    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $sizes = $this->listLocationsService->execute($perPage);
        return LocationResource::collection($sizes);
    }

    public function store(CreateLocationRequest $request)
    {
        $data = $request->validated();
        $location = $this->createLocationService->execute($data);
        return response()->json(new LocationResource($location), 201);
    }
}
