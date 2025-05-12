<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['user_id'] ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });
    }
}
