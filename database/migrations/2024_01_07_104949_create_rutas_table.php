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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('flota_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('espacio_departure_id');
            $table->unsignedBigInteger('espacio_arrival_id');
            $table->string('horaInicio');
            $table->string('horaFin');
            $table->unsignedFloat('distancia');
            $table->string('tiempoEstimado');
            $table->unsignedInteger('precioBillete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
