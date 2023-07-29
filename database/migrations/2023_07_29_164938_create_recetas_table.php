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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->text('instrucciones_preparacion');
            $table->integer('tiempo_preparacion');
            $table->integer('tiempo_coccion');
            $table->integer('porciones');
            $table->enum('dificultad', ['Fácil', 'Moderada', 'Difícil']);
            $table->decimal('calificacion_promedio', 4, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
