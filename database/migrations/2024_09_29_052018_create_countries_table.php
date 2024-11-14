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
        Schema::create('countries', function (Blueprint $table) {
            //$table->id(); // Esto crea una columna 'id' autoincremental.
            $table->bigIncrements('id');
            $table->string('country_code', 2)->default('');
            $table->string('country_name', 100)->default('');
            $table->tinyInteger('status')->default(1);
            $table->timestamps(); // Esto crea 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
