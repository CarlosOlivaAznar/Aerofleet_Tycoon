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
        Schema::create('acciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sede_id');
            $table->unsignedInteger('user_id');
            $table->unsignedFloat('accionesCompradas');
            $table->unsignedBigInteger('valorCompra');
            $table->unsignedBigInteger('beneficios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acciones');
    }
};
