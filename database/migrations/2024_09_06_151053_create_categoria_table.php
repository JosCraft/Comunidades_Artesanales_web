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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();

            /**** */
            //$table->string('imagen')->nullable(); 
            //$table->string('miniatura')->nullable(); 
            $table->string('slug'); // Versión amigable del nombre para URLs (obligatorio).
            $table->integer('categoria_padre')->nullable(); // Campo que podría usarse para definir una subcategoría (puede ser nulo).
            $table->enum('estado', ['0', '1'])->default('1'); // Estado de la categoría: '0' para inactivo, '1' para activo. Por defecto es '1' (activo).
            
            /**** */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
