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
        Schema::create('hace', function (Blueprint $table) {
            $table->foreignId('id_comunario')->constrained('comunarios'); // FK to COMUNARIO
            $table->foreignId('id_producto')->constrained('productos'); // FK to PRODUCTO
            $table->integer('stock');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_fabricacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hace');
    }
};
