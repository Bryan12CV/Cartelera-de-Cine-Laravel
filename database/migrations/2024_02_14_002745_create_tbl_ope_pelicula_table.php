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
        Schema::create('tbl_ope_peliculas', function (Blueprint $table) {
            $table->id('PeliculaId');
            $table->string('Pelicula_Nombre');
            $table->string('Pelicula_Precio');
            $table->string('Pelicula_Entradas');
            //$table->string('Pelicula_Img');
            $table->string('Pelicula_Total');
            $table->string('Pelicula_Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ope_peliculas');
    }
};
