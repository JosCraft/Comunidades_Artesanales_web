<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre_producto', 'imagen', 'id_categoria'];

    // Relación uno a muchos inversa con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Relación muchos a muchos con comunarios (hace)
    public function comunarios()
    {
        return $this->belongsToMany(Comunario::class, 'hace', 'id_producto', 'id_comunario')
                    ->withPivot('stock', 'descripcion', 'precio', 'fecha_fabricacion');
    }

    // Relación muchos a muchos con promociones
    public function promociones()
    {
        return $this->belongsToMany(Promocion::class, 'tiene', 'id_producto', 'id_promocion')
                    ->withPivot('fecha_inicio', 'fecha_fin');
    }

    // Relación muchos a muchos con calificaciones
    public function calificaciones()
    {
        return $this->belongsToMany(Comprador::class, 'califica', 'id_producto', 'id_comprador')
                    ->withPivot('comentario', 'puntuacion', 'fecha');
    }
}
