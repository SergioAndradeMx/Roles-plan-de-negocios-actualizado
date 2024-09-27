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
        Schema::create('costos_variables_cinco_anios_pesimistas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_estudio_financiero')
                ->constrained('estudio_financieros', 'id')
                ->onDelete('cascade')
                ->index('fk_estudio_financiero_cinco');
            $table->foreignId('Id_costo_variable')
                ->constrained('costos_variables', 'id')
                ->onDelete('cascade')
                ->index('fk_costo_variable_cinco');
            $table->integer('anio');
            $table->float('monto_pesimista');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costos_variables_cinco_anios_pesimistas');
    }
};
