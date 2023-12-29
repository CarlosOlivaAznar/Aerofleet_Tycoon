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
            $table->unsignedinteger('uid');
            $table->string('matricula');
            $table->string('modelo');
            $table->date('fechaDeFabricacion');
            $table->unsignedinteger('estado');
            $table->string('status')->nullable();
            $table->double('precio');
            $table->unsignedInteger('rango');
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
