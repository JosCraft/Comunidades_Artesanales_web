<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->foreignId('id_comprador')->constrained('compradores'); // FK to COMPRADOR
            $table->foreignId('id_pedido')->constrained('pedidos'); // FK to PEDIDO
            $table->foreignId('id_producto')->constrained('productos'); // FK to PRODUCTO
            $table->foreignId('id_comunario')->constrained('comunarios'); // FK to COMUNARIO
            $table->string('lugar_entrega');
            $table->date('fecha_pedido');
            $table->integer('cantidad_producto');
            $table->time('tiempo_entrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
