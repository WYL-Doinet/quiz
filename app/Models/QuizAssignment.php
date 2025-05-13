<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['user_id'] ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });
        $query->when($filter['id'] ?? false, function ($query, $id) {
            $query->where('id', $id);
        });
    }
}
