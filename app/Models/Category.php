<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['q'] ?? false, function ($query, $q) {
            $query->where('name', 'LIKE', '%'.$q.'%');
        });

        $query->when($filter['id'] ?? false, function ($query, $id) {
            $query->where('id', $id);
        });
    }
}
