<?php

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
    // Relación uno a muchos inversa con pedidos
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
