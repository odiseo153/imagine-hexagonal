<?php

namespace App\Size\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Size\Domain\Contracts\SizeRepositoryPort;
use App\Size\Domain\Entities\Size;
use App\Models\Size as SizeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SizeRepository  extends BaseRepository implements SizeRepositoryPort
{
    public function __construct()
    {
        parent::__construct(SizeModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = []): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Size $size): Size
    {
        $sizeModel = SizeModel::create([
            'name' => $size->name,
        ]);

        return new Size($sizeModel->toArray());
    }

    public function findById(string $id): Size
    {
        $sizeModel = SizeModel::findOrFail($id);
        return new Size($sizeModel->toArray());
    }

    public function update(string $id, array $data): Size
    {
        $sizeModel = SizeModel::findOrFail($id);
        $sizeModel->update($data);
        return new Size($sizeModel->toArray());
    }

    public function findByName(string $name): Size
    {
        $sizeModel = SizeModel::where('name', $name)->firstOrFail();
        return new Size($sizeModel->toArray());
    }
}
