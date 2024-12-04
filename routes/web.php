<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Container\Attributes\Auth;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Ruta para la página principal (index)
Route::get('/', function () {
    return view('peliculas.index');
})->name('index');

Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');


Route::get('/admin', [AdminController::class, 'index']);

Route::get('/usuario', [UsuarioController::class, 'index'])->middleware('auth');

Route::get('/pelicula/{id}', [PeliculaController::class, 'show']);
Route::post('/pelicula/{id}/comentario', [PeliculaController::class, 'storeComentario'])->middleware('auth');
Route::post('/pelicula/{id}/comentario', [ComentarioController::class, 'store'])->name('comentarios.store');


Route::get('/', [PeliculaController::class, 'index']);
Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');

Route::resource('peliculas', PeliculaController::class);

// Crear una nueva película
Route::get('/peliculas/create', [PeliculaController::class, 'create'])->name('peliculas.create');
Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');

// Editar una película existente
Route::get('/peliculas/{pelicula}/edit', [PeliculaController::class, 'edit'])->name('peliculas.edit');
Route::put('/peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('peliculas.update');

// Eliminar una película
Route::delete('/peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');

