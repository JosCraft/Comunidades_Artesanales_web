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
        Schema::create('califica', function (Blueprint $table) {
            $table->foreignId('id_producto')->constrained('productos'); // FK to PRODUCTO
            $table->foreignId('id_comunario')->constrained('comunarios'); // FK to COMUNARIO
            $table->foreignId('id_comprador')->constrained('compradores'); // FK to COMPRADOR
            $table->text('comentario');
            $table->integer('puntuacion');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('califica');
    }
};
