<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, HasRoles,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'qr_login_code',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'qr_login_code',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function assigns()
    {
        return $this->hasMany(QuizAssignment::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['q'] ?? false, function ($query, $q) {
            $query->where('name', 'LIKE', '%'.$q.'%')->orWhere('email', 'LIKE', '%'.$q.'%');
        });

        $query->when($filter['id'] ?? false, function ($query, $id) {
            $query->where('id', $id);
        });

        $query->when($filter['qr_login_code'] ?? false, function ($query, $qrLoginCode) {
            $query->where('qr_login_code', $qrLoginCode);
        });

        $query->when($filter['created_at'] ?? false, function ($query, $createdAt) {
            $query->where('created_at', '>=', $createdAt);
        });
    }

    public function scopeSort($query, $sort)
    {
        $query->orderBy(...$sort);
    }
}
