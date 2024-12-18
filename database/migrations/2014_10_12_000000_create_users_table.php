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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('tipoUsuario')->default(0);
            $table->string('preferred_language')->default('en');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('saldo')->default(200000000);
            $table->string('ultimaConexion')->default(now());
            $table->string('nombreCompanyia')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
