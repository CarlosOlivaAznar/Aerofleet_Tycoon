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
            $table->unsignedInteger('avion_id');
            $table->date('fechaDeFabricacion');
            $table->string('img');
            $table->string('companyia');
            $table->unsignedinteger('condicion');
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
