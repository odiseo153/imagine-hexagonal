<?php

namespace App\Category\Adapters\Controllers;

use App\Category\Domain\Services\CreateCategoryService;
use App\Category\Http\Requests\CreateCategoryRequest;
use App\Category\Http\Resources\CategoryResource;
use App\Core\Controllers\BaseController;
use Illuminate\Http\JsonResponse;


class CategoryController extends BaseController
{
    private CreateCategoryService $createCategoryService;


    public function __construct(CreateCategoryService $createCategoryService)
    {
        $this->createCategoryService = $createCategoryService;
    }

    // public function index(Request $request)
    // {
    //     $perPage = $this->getPerPage($request);
    //     $sizes = $this->listSizesService->execute($perPage);
    //     return SizeResource::collection($sizes);
    // }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $category = $this->createCategoryService->execute($request->name);
        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(201);
    }

    // public function show($id)
    // {
    //     $user = $this->findSizeByIdService->execute($id);
    //     return  new SizeResource($user);
    // }

    // public function update(UpdateSizeRequest $request, string $id): JsonResponse
    // {
    //     $size = $this->updateSizeService->execute($id, $request->validated());
    //     return response()->json(new SizeResource($size), 200);
    // }
}
