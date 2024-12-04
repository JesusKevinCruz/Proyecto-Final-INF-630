<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['id_pelicula', 'id_usuario', 'Comentario'];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

