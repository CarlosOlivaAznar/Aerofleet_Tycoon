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
        Schema::create('flota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('avion_id');
            $table->string('matricula');
            $table->date('fechaDeFabricacion');
            $table->unsignedFloat('condicion');
            $table->unsignedInteger('estado')->default(0);
            $table->unsignedInteger('rutasCompletadas')->default(0);
            $table->unsignedFloat('horasCompletadas')->default(0);
            $table->unsignedFloat('distanciaCompletada')->default(0);
            $table->string('ultimoMantenimiento')->default(now());
            $table->date('activacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flota');
    }
};
