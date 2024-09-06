<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    protected $fillable = ['id','cod_Adm'];

    // Relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación de administrar usuarios
    public function usuariosAdministrados()
    {
        return $this->belongsToMany(User::class, 'administra', 'id_administrador', 'id_usuario');
    }
}
