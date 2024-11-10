<?php

namespace App\User\Domain\Entities;

class User
{
    public $name;
    public ?string $email;
    public $password;
    public $username;
    public $role;

    public function __construct(string $name, ?string $email, string $password, string $username, string $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->role = $role;
    }
}
