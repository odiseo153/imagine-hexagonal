<?php

namespace App\Category\Domain\Services;

use App\Category\Domain\Contracts\CategoryRepositoryPort;
use App\Category\Domain\Entities\Category;

class UpdateCategoryService
{
    private CategoryRepositoryPort $categoryRepository;

    public function __construct(CategoryRepositoryPort $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(string $id, array $data): Category
    {
        return $this->categoryRepository->update($id, $data);
    }
}
