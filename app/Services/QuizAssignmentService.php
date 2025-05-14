<?php

namespace App\Services;

use App\Models\QuizAssignment;

class QuizAssignmentService
{
    public function __construct(protected QuizAssignment $quizAssignment) {}

    public function findAll($filter = [])
    {
        return $this->quizAssignment->filter($filter)->get();
    }

    public function find($id, $filter = [])
    {
        return $this->quizAssignment->filter($filter)->findOrFail($id);
    }

    public function store($data)
    {
        return $this->quizAssignment->create($data);
    }

    public function findFirst($filter = [])
    {
         return $this->quizAssignment->filter($filter)->first();
    }
}
