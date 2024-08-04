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
        Schema::create('estudio_financieros', function (Blueprint $table) {
            // Los campos de la tabla
            $table->id();
            $table->foreignId('plan_de_negocio_id')->unique()->constrained('plan_de_negocios')->onDelete('cascade');
            $table->float('total_costo_fijo');
            $table->float('total_costo_variable');
            $table->float('total_ingresos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudio_financieros');
    }
};
