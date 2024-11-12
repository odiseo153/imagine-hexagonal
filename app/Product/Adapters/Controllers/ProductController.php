<?php

namespace App\Product\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Product\Domain\Services\CreateProductService;
use App\Product\Domain\Services\ListProductsService;
use App\Product\Http\Requests\CreateProductRequest;
use App\Product\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductController  extends BaseController
{
    private CreateProductService $createProductService;
    private ListProductsService $listProductsService;

    public function __construct(CreateProductService $createProductService, ListProductsService $listProductsService)
    {
        $this->createProductService = $createProductService;
        $this->listProductsService = $listProductsService;
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
}
