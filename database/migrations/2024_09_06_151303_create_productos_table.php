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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // PK
            $table->binary('imagen'); // Para almacenar la imagen en formato binario (BLOB)
            $table->string('nombre_producto');
            $table->foreignId('id_categoria')->constrained('categorias'); // FK to CATEGORIA

            /**** */
                //$table->string('slug')->nullable();
                $table->text('texto_corto')->nullable();
                $table->double('precio',8,2)->nullable();
                $table->string('size')->nullable();
                $table->string('color')->nullable();
                $table->integer('qty')->nullable();  // cantidad disponible
                $table->enum('estado', ['0','1'])->default('0');
                $table->longText('contenido')->nullable();

            /*** */
            $table->timestamps();


   

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
