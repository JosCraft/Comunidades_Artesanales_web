<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    protected $fillable = ['id','servicio', 'salario', 'turno', 'id_comunidad','user_id'];

    // Relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación de muchos a muchos con comunarios (designa)
    public function pedidosDesignados()
    {
        return $this->belongsToMany(Comunario::class, 'designa', 'id_delivery', 'id_comunario')
                    ->withPivot('id_pedido', 'ubicacion');
    }

    // Relacion con comunidad
    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class, 'id_comunidad');
    }

}
