<?php

namespace App\User\Domain\Entities;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $username;
    public $role;
    public $created_at;
    public $updated_at;

    public function __construct(
        string $email,
        string $password,
        string $name = null,
        string $username = null,
        string $role = null,
        ?string $id = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->role = $role;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
