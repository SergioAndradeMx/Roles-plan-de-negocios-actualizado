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
        Schema::create('descripcion_puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nivel');
            $table->string('codigo')->unique();
            $table->string('unidad_administrativa');
            $table->string('nombre_puesto');
            $table->text('descripcion_generica');
            $table->text('descripcion_especifica');
            $table->text('objetivos_puesto');
            $table->decimal('salario_minimo', 10, 2);
            $table->decimal('salario_maximo', 10, 2);
            $table->string('jornada_laboral');
            $table->integer('numero_plaza');
            $table->string('reporta_a')->nullable();
            $table->string('supervisa_a')->nullable();
            $table->text('comunicacion_interna')->nullable();
            $table->text('comunicacion_externa')->nullable();
            $table->string('estado_civil')->nullable();
            $table->integer('edad')->nullable();
            $table->string('genero')->nullable();
            $table->text('requisitos_generales')->nullable();
            $table->text('habilidades_fisicas')->nullable();
            $table->text('habilidades_mentales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descripcion_puestos');
    }
};
