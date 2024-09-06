<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';
    protected $fillable = ['id', 'tipo', 'descripcion', 'id_comunario'];

    // Relación uno a muchos inversa con comunario
    public function comunario()
    {
        return $this->belongsTo(Comunario::class, 'id_comunario');
    }
}
