<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Pelicula;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function index()
    {
        $user1 = Auth::user();
        
        $peliculas = Pelicula::with('comentarios.usuario')->get();
        return view('usuario.index', compact('peliculas', 'user1'));
    }

}

