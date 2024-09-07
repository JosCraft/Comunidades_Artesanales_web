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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id(); // Clave primaria propia de la tabla deliveries
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique(); // FK a users
            $table->string('servicio');
            $table->decimal('salario', 8, 2);
            $table->string('turno');
            $table->foreignId('id_comunidad')->constrained('comunidades'); // FK a comunidades
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
