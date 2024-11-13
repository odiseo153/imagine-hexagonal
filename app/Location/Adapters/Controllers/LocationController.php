<?php

namespace App\Location\Adapters\Controllers;

use App\Location\Http\Resources\LocationResource;
use App\Core\Controllers\BaseController;
use App\Location\Domain\Services\CreateLocationService;
use App\Location\Domain\Services\FindLocationByIdService;
use App\Location\Domain\Services\FindLocationByNameService;
use App\Location\Domain\Services\ListLocationsService;
use App\Location\Domain\Services\UpdateLocationService;
use App\Location\Http\Requests\CreateLocationRequest;
use App\Location\Http\Requests\UpdateLocationRequest;
use Illuminate\Http\Request;


class LocationController extends BaseController
{
    private CreateLocationService $createLocationService;
    private ListLocationsService $listLocationsService;
    private FindLocationByIdService $findLocationByIdService;
    private FindLocationByNameService $findLocationByNameService;
    private  UpdateLocationService $updateLocationService;

    public function __construct(
        CreateLocationService $createLocationService,
        ListLocationsService $listLocationsService,
        FindLocationByIdService $findLocationByIdService,
        FindLocationByNameService $findLocationByNameService,
        UpdateLocationService $updateLocationService
    ) {
        $this->createLocationService = $createLocationService;
        $this->listLocationsService = $listLocationsService;
        $this->findLocationByIdService = $findLocationByIdService;
        $this->findLocationByNameService = $findLocationByNameService;
        $this->updateLocationService = $updateLocationService;
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

    public function show(string $id)
    {
        $location = $this->findLocationByIdService->execute($id);
        return new LocationResource($location);
    }

    public function showByName(string $name)
    {
        $location = $this->findLocationByNameService->execute($name);
        return new LocationResource($location);
    }

    public function update(UpdateLocationRequest $request, string $id)
    {
        $data = $request->validated();
        $location = $this->updateLocationService->execute($id, $data);
        return new LocationResource($location);
    }
}
