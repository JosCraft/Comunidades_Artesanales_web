<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    // Campos que se pueden asignar en masa
    protected $fillable = ['id', 'nombre', 'descripcion', 'slug', 'categoria_padre', 'estado'];

    // Relación uno a muchos con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
