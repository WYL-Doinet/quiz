<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizAssignment extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'assign_at',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {   
        $query->when($filter['quiz_id'] ?? false, function ($query, $quizId) {
            $query->where('quiz_id', $quizId);
        });

        $query->when($filter['user_id'] ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });
        
        $query->when($filter['id'] ?? false, function ($query, $id) {
            $query->where('id', $id);
        });
    }
}
