<?php

namespace App\Services;

use App\Models\Quiz;

class QuizService
{
    public function __construct(protected Quiz $quiz) {}

    public function findAll($filter = [])
    {
        return $this->quiz->sort(['id', 'desc'])
            ->filter($filter)
            ->latest()
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->quiz->findOrFail($id);
    }

    public function store($data)
    {
        return $this->quiz->create($data);
    }
}
