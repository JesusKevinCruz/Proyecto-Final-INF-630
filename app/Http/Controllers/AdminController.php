<?php
namespace App\Http\Controllers;
use App\Models\Pelicula;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $peliculasPorAño = Pelicula::selectRaw('Año, count(*) as total')
            ->groupBy('Año')
            ->get();

        $peliculas = Pelicula::with('comentarios.usuario')->get();
        return view('admin.index', compact('peliculas', 'usuarios', 'peliculasPorAño')); // Vista para el usuario
    }
}

