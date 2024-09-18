<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Comunidad extends Model
{
    protected $table = 'comunidades';
    protected $fillable = ['id','pais', 'departamento', 'municipio', 'nombre_comunidad'];

    // Relación uno a muchos con comunarios
    public function comunarios()
    {
        return $this->hasMany(Comunario::class, 'id_comunidad');
    }
}
