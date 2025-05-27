<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'created_by'
    ];


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['title'] ?? false, function ($query, $title) {
            $query->where('title', 'like', '%' . $title . '%');
        });

        $query->when($filter['user_id'] ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });

        $query->when($filter['category_id'] ?? false, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    public function scopeSort($query, $sort)
    {
        $query->orderBy(...$sort);
    }
}
