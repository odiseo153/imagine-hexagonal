<?php

namespace App\Category\Adapters\Repositories;

use App\Category\Domain\Contracts\CategoryRepositoryPort;
use App\Category\Domain\Entities\Category;
use App\Core\Repositories\BaseRepository;
use App\Models\Category as CategoryModel;

class CategoryRepository   extends BaseRepository implements CategoryRepositoryPort
{
    public function __construct()
    {
        parent::__construct(CategoryModel::class);
    }

    public function create(Category $category): Category
    {
        $categoryModel = CategoryModel::create([
            'name' => $category->name,
        ]);

        return new category(
            $categoryModel->name,
            $categoryModel->id,
            $categoryModel->created_at->toDateTimeString(),
            $categoryModel->updated_at->toDateTimeString()
        );
    }

    public function findById(string $id): Category
    {
        $categoryModel = CategoryModel::findOrFail($id);

        return new Category(
            $categoryModel->name,
            $categoryModel->id,
            $categoryModel->created_at->toDateTimeString(),
            $categoryModel->updated_at->toDateTimeString()
        );
    }

    public function update(string $id, array $data): Category
    {
        $categoryModel = CategoryModel::findOrFail($id);

        $categoryModel->update($data);

        return new Category(
            $categoryModel->name,
            $categoryModel->id,
            $categoryModel->created_at->toDateTimeString(),
            $categoryModel->updated_at->toDateTimeString()
        );
    }
}
