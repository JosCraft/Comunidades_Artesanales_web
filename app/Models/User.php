<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
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
        'id','nombre',
        'apePaterno',
        'apeMaterno',
        'genero',
        'celular',
        'email',
        'password',
        'fechaNac',
        'foto',
        'codeValidacion',
        'cantIntentos',
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
        return $this->hasOne(Administrador::class, 'user_id');
    }

    public function comunario()
    {
        return $this->hasOne(Comunario::class, 'user_id');
    }

    public function comprador()
    {
        return $this->hasOne(Comprador::class, 'user_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'user_id');
    }

    /**
     * Get the roles that belong to the user.
     */
    public function roles()
{
    return $this->belongsToMany(Rol::class, 'rolesuser', 'user_id', 'role_id');
}


    /**
     * Check one role
     * @param string $role
     * @return bool
     */
    public function getRoleNames()
    {
        return $this->roles()->pluck('name');
    }

        /**
     * Verificar si el usuario tiene un rol específico.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    /**
     * Verificar si el usuario tiene alguno de los roles dados.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }

}
