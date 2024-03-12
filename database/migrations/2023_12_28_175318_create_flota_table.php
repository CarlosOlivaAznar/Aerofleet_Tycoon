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
            $table->unsignedinteger('user_id');
            $table->unsignedinteger('avion_id');
            $table->string('matricula');
            $table->date('fechaDeFabricacion');
            $table->unsignedinteger('condicion');
            $table->unsignedInteger('estado')->default(0);
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
