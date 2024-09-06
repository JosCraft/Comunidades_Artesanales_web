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
        'id','nombre', 'apePaterno', 'apeMaterno', 'genero', 'celular', 'email', 'password', 'fechaNac'
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

    // Relación uno a muchos: un usuario puede ser administrador, comprador, comunario o delivery.
    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'id');
    }

    public function comunario()
    {
        return $this->hasOne(Comunario::class, 'id');
    }

    public function comprador()
    {
        return $this->hasOne(Comprador::class, 'id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'id');
    }

    /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(UserRol::class, 'rolesuser');
    }

}
