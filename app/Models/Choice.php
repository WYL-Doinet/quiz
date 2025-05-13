<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    protected $fillable = [
        'question_id',
        'is_correct',
        'choice_text',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];


    public function question(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['question_id'] ?? false, function ($query, $questionId) {
            $query->where('question_id', $questionId);
        });
    }
}
