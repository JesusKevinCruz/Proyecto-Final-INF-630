<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    use HasFactory;
    protected $fillable = [
        'Titulo',
        'Director',
        'Año',
        'Genero',
        'Sinopsis',
        'Calificacion',
        'imagen',
    ];

    protected $table = 'peliculas';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_pelicula');
    }
}
