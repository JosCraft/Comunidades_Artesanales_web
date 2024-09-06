<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['id','nombre','descripcion'];

    // Relación uno a muchos con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
