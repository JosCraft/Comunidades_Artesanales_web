<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunario extends Model
{
    protected $table = 'comunarios';
    protected $fillable = ['id','especialidad', 'id_comunidad','user_id'];

    // Relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación uno a muchos inversa con Comunidad
    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class, 'id_comunidad');
    }

    // Relación muchos a muchos con productos (hace)
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'hace', 'id_comunario', 'id_producto')
                    ->withPivot('stock', 'descripcion', 'precio', 'fecha_fabricacion');
    }

    // Relación uno a muchos con notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_comunario');
    }
}
