<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('proyecciones', function (Blueprint $table) {
            $table->id();
            $table->string('puesto');
            $table->integer('numero_trabajadores');
            $table->decimal('salario', 10, 2);
            $table->decimal('total', 10, 2);
            
            // Nuevas columnas para los 5 años
            $table->decimal('año_1', 10, 2)->nullable();
            $table->decimal('año_2', 10, 2)->nullable();
            $table->decimal('año_3', 10, 2)->nullable();
            $table->decimal('año_4', 10, 2)->nullable();
            $table->decimal('año_5', 10, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecciones');
    }
};
