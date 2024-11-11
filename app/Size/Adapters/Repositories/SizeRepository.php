<?php

namespace App\Size\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Size\Domain\Contracts\SizeRepositoryPort;
use App\Size\Domain\Entities\Size;
use App\Models\Size as SizeModel;

class SizeRepository  extends BaseRepository implements SizeRepositoryPort
{
    public function __construct()
    {
        parent::__construct(SizeModel::class);
    }

    public function create(Size $size): Size
    {
        $sizeModel = SizeModel::create([
            'name' => $size->name,
        ]);

        return new Size(
            $sizeModel->name,
            $sizeModel->id,
            $sizeModel->created_at->toDateTimeString(),
            $sizeModel->updated_at->toDateTimeString()
        );
    }

    public function findById(string $id): Size
    {
        $sizeModel = SizeModel::findOrFail($id);

        return new Size(
            $sizeModel->name,
            $sizeModel->id,
            $sizeModel->created_at->toDateTimeString(),
            $sizeModel->updated_at->toDateTimeString()
        );
    }
}
