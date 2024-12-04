<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class InsertarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Insertar a Tabla usuario
        $usuarios = [
            ['Nombre' => 'Juan Ramirez', 'Email'=>'juan@correo.com', 'Contraseña'=>Hash::make('123456'), 'Rol'=>'usuario'],
            ['Nombre' => 'Ana Gomez', 'Email'=>'ana@correo.com', 'Contraseña'=>Hash::make('123456'), 'Rol'=>'administrador'],
            ['Nombre' => 'Carlos Fernandes', 'Email'=>'carlos@correo.com', 'Contraseña'=>Hash::make('123456'), 'Rol'=>'usuario']
        ];
        foreach ($usuarios as $usuario){
            DB::table('usuarios')->insert($usuario);
        }

        //Insertar a tabla peliculas
        $peliculas = [
            ['Titulo' => 'Inception', 'Director' => 'Christopher Nolan', 'Año' => 2010, 'Genero' => 'Ciencia ficción', 'Sinopsis' => 'Un ladrón especializado en el robo de secretos a través de los sueños.', 'Calificacion' => 4.8],
            ['Titulo' => 'The Dark Knight', 'Director' => 'Christopher Nolan', 'Año' => 2008, 'Genero' => 'Acción', 'Sinopsis' => 'Batman enfrenta al Joker, un criminal dispuesto a desatar el caos en Gotham.', 'Calificacion' => 4.9],
            ['Titulo' => 'Interstellar', 'Director' => 'Christopher Nolan', 'Año' => 2014, 'Genero' => 'Ciencia ficción', 'Sinopsis' => 'Un grupo de astronautas viaja a través de un agujero negro para salvar a la humanidad.', 'Calificacion' => 4.7],
        ];
        foreach ($peliculas as $pelicula){
            DB::table('peliculas')->insert($pelicula);
        }
         //Insertar a tabla comentarios
         $comentarios = [
            ['id_pelicula' => 1, 'id_usuario' => 1, 'Comentario' => 'Excelente película, me hizo pensar mucho sobre los sueños.', 'Fecha' => Carbon::now()->toDateString()],
            ['id_pelicula' => 2, 'id_usuario' => 2, 'Comentario' => 'El mejor Batman de todos los tiempos, increíble historia.', 'Fecha' => Carbon::now()->toDateString()],
            ['id_pelicula' => 3, 'id_usuario' => 3, 'Comentario' => 'Una película visualmente impresionante, pero algo compleja.', 'Fecha' => Carbon::now()->toDateString()]
         ];
         foreach ($comentarios as $comentario){
            DB::table('comentarios')->insert($comentario);
         }

    }
}
