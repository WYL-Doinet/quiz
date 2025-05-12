<?php
namespace App\Services;

use App\Models\Quiz;

class QuizService {
    
    public function __construct(protected Quiz $quiz)
    {
        
    }

    public  function findAll($filter = [])
    {
        return $this->quiz->filter($filter)->get();
    }

    public function find($id)
    {
        return $this->quiz->findOrFail($id);
    }
}