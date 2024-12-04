<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::with('comentarios.usuario')->get();
        return view('welcome', compact('peliculas'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:50',
            'director' => 'required|string',
            'año' => 'required|integer',
            'genero' => 'required|string',
            'sinopsis' => 'required|string|max:300',
            'calificacion' => 'required|numeric|regex:/^\d+([.,]\d{1,1})?$/|min:0|max:5',  // Punto o coma como separador decimal
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);        
        

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('peliculas', 'public');
        } else {
            $imagenPath = null;
        }
            

        Pelicula::create([
            'Titulo' => $request->titulo,
            'Director' => $request->director,
            'Año' => $request->año,
            'Genero' => $request->genero,
            'Sinopsis' => $request->sinopsis,
            'Calificacion' => $request->calificacion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('admin.index')->with('success', 'Película creada con éxito');
    }

    public function edit(Pelicula $pelicula)
    {
        return view('admin.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo' => 'required|string|max:50',
            'director' => 'required|string',
            'año' => 'required|integer',
            'genero' => 'required|string',
            'sinopsis' => 'required|string|max:300',
            'calificacion' => 'required|numeric|min:0|max:5',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('peliculas', 'public');

            if ($pelicula->imagen && file_exists(storage_path('app/public/' . $pelicula->imagen))) {
                unlink(storage_path('app/public/' . $pelicula->imagen));
            }
        } else {
            $imagenPath = $pelicula->imagen;
        }

        $pelicula->update([
            'Titulo' => $request->titulo,
            'Director' => $request->director,
            'Año' => $request->año,
            'Genero' => $request->genero,
            'Sinopsis' => $request->sinopsis,
            'Calificacion' => $request->calificacion,
            'imagen' => $imagenPath, 
        ]);

        return redirect()->route('admin.index')->with('success', 'Película actualizada con éxito');
    }


    public function destroy(Pelicula $pelicula)
    {
        if ($pelicula->imagen) {
            unlink(storage_path('app/public/' . $pelicula->imagen));
        }

        $pelicula->delete();

        return redirect()->route('admin.index')->with('success', 'Película eliminada con éxito');
    }

    public function show($id)
    {
        $pelicula = Pelicula::with('comentarios.usuario')->findOrFail($id);
        return view('peliculas.show', compact('pelicula'));
    }

    public function storeComentario(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|max:200',
        ]);

        $comentario = new Comentario();
        $comentario->id_pelicula = $id;
        $comentario->id_usuario = auth()->id();
        $comentario->Comentario = $request->comentario;
        $comentario->Fecha = Carbon::now(); 
        $comentario->save();

        return back();
    }

}

