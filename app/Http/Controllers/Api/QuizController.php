<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuizController extends Controller
{   
    public function __construct(protected QuestionService $questionService)
    {
        
    }

    public function question($id)
    {
        return QuestionResource::collection($this->questionService->findAll(['quiz_id' => $id]));
    }
}
