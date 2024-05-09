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
        Schema::create('aviones', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('fabricante');
            $table->double('precio');
            $table->unsignedInteger('capacidad');
            $table->unsignedInteger('rango');
            $table->string('img');
            $table->unsignedFloat('costePorKm');
            $table->unsignedFloat('tiempoPorKm');
            $table->unsignedInteger('categoria');
            $table->tinyInteger('primeraMano');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aviones');
    }
};
