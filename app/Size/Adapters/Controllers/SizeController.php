<?php

namespace App\Size\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Size\Domain\Services\CreateSizeService;
use App\Size\Http\Requests\CreateSizeRequest;
use App\Size\Http\Resources\SizeResource;
use Illuminate\Http\JsonResponse;


class SizeController extends BaseController
{
    private CreateSizeService $createSizeService;

    public function __construct(CreateSizeService $createSizeService,)
    {
        $this->createSizeService = $createSizeService;
    }

    public function store(CreateSizeRequest $request): JsonResponse
    {
        $size = $this->createSizeService->execute($request->name);
        return (new SizeResource($size))
            ->response()
            ->setStatusCode(201);
    }
}
