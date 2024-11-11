<?php

namespace App\Size\Domain\Entities;

class Size
{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public function __construct(

        string $name = null,
        ?string $id = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
