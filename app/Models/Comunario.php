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
        return $this->belongsTo(User::class, 'user_id');
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
                    ->withPivot('fecha_fabricacion');
    }

    // Agergar un producto a un comunario
    public function addProduct($producto, $fecha_fabricacion)
    {
        $this->productos()->attach($producto, [
            'fecha_fabricacion' => $fecha_fabricacion,
        ]);
    }

    // Dela relacion con productos regresar la cantidad de productos que tiene un comunario
    public function productosCount()
    {
        return $this->belongsToMany(Producto::class, 'hace', 'id_comunario', 'id_producto')
                    ->withPivot('fecha_fabricacion')
                    ->selectRaw('count(hace.id_producto) as cantidad')
                    ->groupBy('hace.id_comunario');
    }


    // Relación uno a muchos con notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_comunario');
    }
}
