<?php

namespace App\Models;

use Hamcrest\Type\IsBoolean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function PHPUnit\Framework\isBool;
use function PHPUnit\Framework\isNull;

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

        $query->when($filter['completed_at'] ?? null, function ($query, $completedAt) {
            switch ($completedAt) {
                case  true:
                    $query->whereNotNull('completed_at');
                    break;

                case false:
                    $query->whereNull('completed_at');
                    break;
                default:
                    $query->where('completed_at', $completedAt);
                    break;
            }
        });
    }

    public function scopeFilterNull($query, $fillable) {}
}
