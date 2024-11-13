<?php

namespace App\Product\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Product\Domain\Services\CreateProductService;
use App\Product\Domain\Services\FindProductByIdService;
use App\Product\Domain\Services\ListProductsService;
use App\Product\Domain\Services\UpdateProductService;
use App\Product\Http\Requests\CreateProductRequest;
use App\Product\Http\Requests\UpdateProductRequest;
use App\Product\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductController  extends BaseController
{
    private CreateProductService $createProductService;
    private ListProductsService $listProductsService;
    private FindProductByIdService $findProductByIdService;
    private UpdateProductService $updateProductService;

    public function __construct(
        CreateProductService $createProductService,
        ListProductsService $listProductsService,
        FindProductByIdService $findProductByIdService,
        UpdateProductService $updateProductService
    ) {
        $this->createProductService = $createProductService;
        $this->listProductsService = $listProductsService;
        $this->findProductByIdService = $findProductByIdService;
        $this->updateProductService = $updateProductService;
    }


    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $products = $this->listProductsService->execute($perPage);
        return ProductResource::collection($products);
    }

    public function store(CreateProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product = $this->createProductService->execute($data);
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function show(string $id): JsonResponse
    {
        $product = $this->findProductByIdService->execute($id);
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->validated();
        $product = $this->updateProductService->execute($id, $data);
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
    }
}
