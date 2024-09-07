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
            // Definir 'id' como PK y agregarla como clave foránea hacia 'users'
            $table->unsignedBigInteger('id')->primary(); // PK

            // Agregar la clave foránea hacia 'users'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Definir la clave foránea hacia 'comunidades'
            $table->foreignId('id_comunidad')->constrained('comunidades')->onDelete('cascade'); // FK hacia 'comunidades'

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
