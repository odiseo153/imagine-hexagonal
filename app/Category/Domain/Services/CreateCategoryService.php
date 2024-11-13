<?php

namespace App\Category\Domain\Services;

use App\Category\Domain\Contracts\CategoryRepositoryPort;
use App\Category\Domain\Entities\Category;

class CreateCategoryService
{
    private CategoryRepositoryPort $categoryRepository;

    public function __construct(CategoryRepositoryPort $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(array $data): Category
    {
        $category = new Category($data);
        return $this->categoryRepository->create($category);
    }
}
