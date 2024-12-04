<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string|max:200',
        ]);

        $pelicula = Pelicula::findOrFail($id);

        $comentario = new Comentario();
        $comentario->id_pelicula = $pelicula->id;
        $comentario->id_usuario = Auth::id();
        $comentario->Comentario = $request->comentario;
        $comentario->Fecha = now();
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario publicado con éxito.');
    }
}
