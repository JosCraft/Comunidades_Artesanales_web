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
        Schema::create('comunarios', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users'); // FK to USUARIO (PK)
            $table->foreignId('id_comunidad')->constrained('comunidades'); // FK to COMUNIDAD
            $table->string('especialidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunarios');
    }
};
