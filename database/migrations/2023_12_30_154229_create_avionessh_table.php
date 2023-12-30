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
        Schema::create('avionessh', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->date('fechaDeFabricacion');
            $table->double('precio');
            $table->unsigneInt('estado');
            $table->unsignedInteger('rango');
            $table->string('img');
            $table->string('compañia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avionessh');
    }
};
