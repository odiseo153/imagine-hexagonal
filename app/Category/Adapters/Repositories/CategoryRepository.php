<?php

namespace App\Category\Adapters\Repositories;

use App\Category\Domain\Contracts\CategoryRepositoryPort;
use App\Category\Domain\Entities\Category;
use App\Core\Repositories\BaseRepository;
use App\Models\Category as CategoryModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CategoryRepository extends BaseRepository implements CategoryRepositoryPort
{
    public function __construct()
    {
        parent::__construct(CategoryModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = []): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Category $category): Category
    {
        $categoryModel = CategoryModel::create([
            'name' => $category->name,
        ]);
        return new category($categoryModel->toArray());
    }

    public function findById(string $id): Category
    {
        $categoryModel = CategoryModel::findOrFail($id);
        return new Category($categoryModel->toArray());
    }

    public function update(string $id, array $data): Category
    {
        $categoryModel = CategoryModel::findOrFail($id);
        $categoryModel->update($data);
        return new Category($categoryModel->toArray());
    }

    public function findByName(string $name): Category
    {
        $categoryModel = CategoryModel::where('name', $name)->firstOrFail();
        return new Category($categoryModel->toArray());
    }
}
