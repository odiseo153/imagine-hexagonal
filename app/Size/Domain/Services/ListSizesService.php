<?php

namespace App\Size\Domain\Services;

use App\Size\Domain\Contracts\SizeRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListSizesService
{
    private SizeRepositoryPort $sizeRepository;

    public function __construct(SizeRepositoryPort $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }

    public function execute(int $perPage): LengthAwarePaginator
    {
        return $this->sizeRepository->getAll($perPage);
    }
}
