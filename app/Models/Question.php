<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'quiz_id',

    ];

    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['quiz_id'] ?? false, function ($query, $quizId) {
            $query->where('quiz_id', $quizId);
        });
    }
}
