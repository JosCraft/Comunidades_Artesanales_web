<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';
    protected $fillable = ['id','tipo', 'nombre_promocion', 'descripcion', 'descuento'];

    // Relación muchos a muchos con productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'tiene', 'id_promocion', 'id_producto')
                    ->withPivot('fecha_inicio', 'fecha_fin');
    }
}
