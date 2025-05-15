<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(protected User $user) {}


    public function findAll($filter = [])
    {
        return $this->user->filter($filter)
            ->get();
    }

    public function store($data)
    {
        return $this->user->create($data);
    }
}
