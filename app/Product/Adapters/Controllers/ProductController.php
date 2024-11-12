<?php

namespace App\Product\Adapters\Controllers;

use App\Core\Controllers\BaseController;
use App\Product\Domain\Services\CreateProductService;
use App\Product\Http\Requests\CreateProductRequest;
use App\Product\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductController  extends BaseController
{
    private CreateProductService $createProductService;

    public function __construct(CreateProductService $createProductService)
    {
        $this->createProductService = $createProductService;
    }

    public function store(CreateProductRequest $request): JsonResponse
    {
        $product = $this->createProductService->execute(
            $request->name,
            $request->costPrice,
            $request->salePrice,
            $request->filledWeight,
            $request->emptyWeight,
            $request->canSellInVip,
            $request->canSellInGate,
            $request->user()->id,
            $request->categoryId,
            $request->sizeId
        );
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }
}
