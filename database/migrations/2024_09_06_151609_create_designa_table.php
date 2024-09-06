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
        Schema::create('designa', function (Blueprint $table) {
            $table->foreignId('id_delivery')->constrained('deliveries'); // FK to DELIVERY
            $table->foreignId('id_comunario')->constrained('comunarios'); // FK to COMUNARIO
            $table->foreignId('id_pedido')->constrained('pedidos'); // FK to PEDIDO
            $table->string('ubicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designa');
    }
};
