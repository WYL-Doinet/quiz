<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function __construct(protected Question $question) {}

    public function findAll($filter = [])
    {
        return $this->question->filter($filter)->get();
    }

    public function find($id)
    {
        return $this->question->find($id);
    }

    public function store($data)
    {
        return $this->question->create($data);
    }
}
