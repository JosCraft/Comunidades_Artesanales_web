<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $table = 'compradores';
    protected $fillable = ['id','user_id'];
    // Relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación de muchos a muchos con productos y comunarios (detalle_pedido)
    public function pedidos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_pedido', 'id_comprador', 'id_producto')
                    ->withPivot('id_pedido', 'id_comunario', 'lugar_entrega', 'fecha_pedido', 'cantidad_producto', 'tiempo_entrega');
    }

    // Relación muchos a muchos con devoluciones
    public function devoluciones()
    {
        return $this->belongsToMany(Producto::class, 'devolucion', 'id_comprador', 'id_producto')
                    ->withPivot('id_comunario', 'id_delivery', 'cantidad_producto', 'lugar_recogida', 'razon');
    }
}
