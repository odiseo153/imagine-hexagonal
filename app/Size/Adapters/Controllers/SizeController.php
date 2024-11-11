<?php

namespace App\Size\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Size\Domain\Services\CreateSizeService;
use App\Size\Domain\Services\FindSizeByIdService;
use App\Size\Domain\Services\FindSizeByNameService;
use App\Size\Domain\Services\ListSizesService;
use App\Size\Domain\Services\UpdateSizeService;
use App\Size\Http\Requests\CreateSizeRequest;
use App\Size\Http\Requests\UpdateSizeRequest;
use App\Size\Http\Resources\SizeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class SizeController extends BaseController
{
    private CreateSizeService $createSizeService;
    private FindSizeByIdService $findSizeByIdService;
    private ListSizesService $listSizesService;
    private UpdateSizeService $updateSizeService;
    private FindSizeByNameService $findSizeByNameService;

    public function __construct(CreateSizeService $createSizeService, FindSizeByIdService $findSizeByIdService, ListSizesService $listSizesService, UpdateSizeService $updateSizeService, FindSizeByNameService $findSizeByNameService)
    {
        $this->createSizeService = $createSizeService;
        $this->listSizesService = $listSizesService;
        $this->findSizeByIdService = $findSizeByIdService;
        $this->updateSizeService = $updateSizeService;
        $this->findSizeByNameService = $findSizeByNameService;
    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $sizes = $this->listSizesService->execute($perPage);
        return SizeResource::collection($sizes);
    }

    public function store(CreateSizeRequest $request): JsonResponse
    {
        $size = $this->createSizeService->execute($request->name);
        return (new SizeResource($size))
            ->response()
            ->setStatusCode(201);
    }

    public function show($id)
    {
        $user = $this->findSizeByIdService->execute($id);
        return  new SizeResource($user);
    }

    public function update(UpdateSizeRequest $request, string $id): JsonResponse
    {
        $size = $this->updateSizeService->execute($id, $request->validated());
        return response()->json(new SizeResource($size), 200);
    }


    public function showSizeByName($name)
    {
        $size = $this->findSizeByNameService->execute($name);
        return  new SizeResource($size);
    }
}
