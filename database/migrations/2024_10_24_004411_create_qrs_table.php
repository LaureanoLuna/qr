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
        Schema::create('qrs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('isdinamico');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('tamanio');
            $table->string('color');
            $table->string('fondo');
            $table->string('tipoFondo');
            $table->string('img')->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->boolean('deshabilitado')->default(false);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrs');
    }
};
