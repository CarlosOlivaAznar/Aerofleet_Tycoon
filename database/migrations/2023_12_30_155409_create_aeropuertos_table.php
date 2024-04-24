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
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->string('icao');
            $table->string('pais');
            $table->string('nombre');
            $table->unsignedInteger('espaciosTotales');
            $table->unsignedInteger('costeOperacional');
            $table->double('latitud', 10, 6);
            $table->double('longitud', 10, 6);
            $table->float('demanda');
            $table->unsignedInteger('pasajerosEstimados');
            $table->unsignedInteger('categoria')->default(1);
            $table->string('isla')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeropuertos');
    }
};
