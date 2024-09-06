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
            $table->foreignId('id')->constrained('users'); // FK to USUARIO (PK)
            $table->string('servicio');
            $table->decimal('salario', 8, 2);
            $table->string('turno');
            $table->foreignId('id_comunidad')->constrained('comunidades'); // FK to COMUNIDAD
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
