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
        Schema::create('administra', function (Blueprint $table) {
            $table->foreignId('id_administrador')->constrained('administradores'); // FK to ADMINISTRADOR
            $table->foreignId('id_usuario')->constrained('users'); // FK to USUARIO
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administra');
    }
};
