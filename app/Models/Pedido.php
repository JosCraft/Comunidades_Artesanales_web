<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['id','estado'];

    // Relación uno a muchos con detalle_pedido
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }
}
