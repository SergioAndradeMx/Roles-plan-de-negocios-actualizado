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
        Schema::create('costos_variables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudio_financiero_id')->constrained('estudio_financieros')->onDelete('cascade');
            $table->string('nombre', 255);
            $table->float('valor_unitario');
            $table->float('cantidad');
            $table->float('escenario_optimista');
            $table->float('escenario_conservador');
            $table->float('escenario_pesimista');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costos_variables');
    }
};
