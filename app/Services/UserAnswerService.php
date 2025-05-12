<?php
namespace App\Services;

use App\Models\UserAnswer;

class UserAnswerService {
    public function __construct(protected UserAnswer $userAnswer)
    {
        
    }

    public function bulkStore($data)
    {
        return $this->userAnswer->insert($data);
    }
}