<?php

namespace App\Category\Adapters\Controllers;

use App\Category\Domain\Services\CreateCategoryService;
use App\Category\Domain\Services\FindCategoryByIdService;
use App\Category\Domain\Services\FindCategoryByNameService;
use App\Category\Domain\Services\ListCategoriesService;
use App\Category\Domain\Services\UpdateCategoryService;
use App\Category\Http\Requests\CreateCategoryRequest;
use App\Category\Http\Requests\UpdateCategoryRequest;
use App\Category\Http\Resources\CategoryResource;
use App\Core\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class CategoryController extends BaseController
{
    private CreateCategoryService $createCategoryService;
    private ListCategoriesService $listCategoriesService;
    private FindCategoryByIdService $findCategoryByIdService;
    private FindCategoryByNameService $findCategoryByNameService;
    private UpdateCategoryService $updateCategoryService;


    public function __construct(
        CreateCategoryService $createCategoryService,
        ListCategoriesService $listCategoriesService,
        FindCategoryByIdService $findCategoryByIdService,
        FindCategoryByNameService $findCategoryByNameService,
        UpdateCategoryService $updateCategoryService
    ) {
        $this->createCategoryService = $createCategoryService;
        $this->listCategoriesService = $listCategoriesService;
        $this->findCategoryByIdService = $findCategoryByIdService;
        $this->findCategoryByNameService = $findCategoryByNameService;
        $this->updateCategoryService = $updateCategoryService;
    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $categories = $this->listCategoriesService->execute($perPage);
        return CategoryResource::collection($categories);
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $category = $this->createCategoryService->execute($data);
        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(201);
    }

    public function show($id)
    {
        $category = $this->findCategoryByIdService->execute($id);
        return  new CategoryResource($category);
    }

    public function showCategoryByName($name)
    {
        $category = $this->findCategoryByNameService->execute($name);
        return  new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = $this->updateCategoryService->execute($id, $request->validated());
        return   new CategoryResource($category);
    }
}
