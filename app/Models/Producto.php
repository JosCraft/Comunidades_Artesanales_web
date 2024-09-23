<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'id',
        'nombre_producto',
        'imagen',
        'id_categoria',
        'texto_corto',
        'precio',
        'size',
        'color',
        'qty',
        'estado',
        'contenido',
    ];

    // Relación uno a muchos inversa con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Relación muchos a muchos con comunarios (hace)
    public function comunarios()
    {
        return $this->belongsToMany(Comunario::class, 'hace', 'id_producto', 'id_comunario')
                    ->withPivot('fecha_fabricacion');
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


    public function agregarPromocion($promocionId, $fechaInicio, $fechaFin)
    {
        // Agrega una promoción al producto con fechas de inicio y fin
        $this->promociones()->attach($promocionId, ['fecha_inicio' => $fechaInicio, 'fecha_fin' => $fechaFin]);
    }

    public function removerPromocion($promocionId)
    {
        // Remueve una promoción del producto
        $this->promociones()->detach($promocionId);
    }

    public function verificarPromocionesExpiradas()
    {
        // Elimina las promociones que ya han expirado
        $this->promociones()->wherePivot('fecha_fin', '<', now())->detach();
    }


}
