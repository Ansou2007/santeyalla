<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'prenom',
        'structure_id',
        'nom',
        'email',
        'telephone',
        'adresse',
        'role',
        'status',
        'password',
        'photo',
        'remember_token',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // pour les autorisations avec Gate
    public function hasRole($roleName)
    {
        return $this->role == $roleName;
    }
    public function structures()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }

    // Feature
    public function isAdmin()
    {
        return $this->roles()->where('nom', 'Admin');
    }
    public function hasAnyRole(array $role)
    {
        return $this->roles()->whereIn('nom', $role)->first();
    }
}
