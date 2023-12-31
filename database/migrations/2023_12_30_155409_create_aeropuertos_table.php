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
            $table->string('nombre');
            $table->unsignedBigInteger('espaciosTotales');
            $table->unsignedBigInteger('costeOperacional1');
            $table->unsignedBigInteger('costeOperacional2');
            $table->unsignedBigInteger('costeOperacional3');
            $table->unsignedBigInteger('costeAlquiler');
            $table->double('latitud', 10, 6);
            $table->double('longitud', 10, 6);
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
