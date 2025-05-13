<?php
namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function __construct(protected Question $question)
    {
        
    }   

    public function findAll($filter = [])
    {
        return $this->question->filter($filter)->get();
    }

    public function store($data)
    {
        return $this->question->create($data);
    }
}