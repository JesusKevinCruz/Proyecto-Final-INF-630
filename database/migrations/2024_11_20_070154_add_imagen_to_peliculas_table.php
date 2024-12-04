<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToPeliculasTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Agregar la columna 'imagen' como string, puedes agregar 'nullable' si quieres que la imagen sea opcional
            $table->string('imagen')->nullable();
        });
    }

    /**
     * Revertir la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
}
