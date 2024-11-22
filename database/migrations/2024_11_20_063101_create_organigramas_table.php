<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganigramasTable extends Migration
{
    public function up()
    {
        Schema::create('organigramas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del archivo
            $table->binary('archivo'); // Contenido binario del archivo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organigramas');
    }
}