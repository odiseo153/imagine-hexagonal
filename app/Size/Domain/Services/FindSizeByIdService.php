<?php

namespace App\Size\Domain\Services;

use App\Size\Domain\Contracts\SizeRepositoryPort;
use App\Size\Domain\Entities\Size;

class FindSizeByIdService
{
    private SizeRepositoryPort $sizeRepository;

    public function __construct(SizeRepositoryPort $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }

    public function execute(string $id): Size
    {
        return $this->sizeRepository->findById($id);
    }
}
