<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $guarded = [
        'level',
        'kamar',
        'kelas',
        'angkatan',
        'foto'
    ];

    protected $fillable = [
        'username',
        'password',
        'level',
        'nama',
        'kamar',
        'kelas',
        'angkatan',
        'foto'
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('nama','like','%' . $search . '%');
        });
    }
}
