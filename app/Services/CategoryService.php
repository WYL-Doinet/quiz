<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct(protected Category $category) {}

    public function findAll()
    {
        return $this->category->all();
    }

    public function store($data)
    {
        return $this->category->create($data);
    }

    public function find($id)
    {
        return $this->category->find($id);
    }
}
