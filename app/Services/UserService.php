<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(protected User $user) {}

    public function findAll($filter = [])
    {
        return $this->user->sort(['id', 'desc'])
            ->filter($filter)
            ->paginate(10);
    }

    public function search($filter = [])
    {
        return $this->user->sort(['id', 'desc'])
            ->filter($filter)
            ->get();
    }

    public function store($data)
    {
        return $this->user->create($data);
    }

    public function find($id, $filter = [])
    {
        return $this->user->filter($filter)->findOrFail($id);
    }

    public function findFirst($filter = [])
    {
        return $this->user->filter($filter)->first();
    }

    public function update($id, $data)
    {
        $user = $this->find($id);
        $user->fill($data);
        $user->save();

        return $user;
    }
}
