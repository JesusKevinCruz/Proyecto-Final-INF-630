<?php

namespace App\Http\Controllers\Auth;

use App\Models\pelicula;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $usuario = \App\Models\Usuario::where('Email', $request->Email)->first();

        if (!$usuario) {
            return back()->withErrors(['Email' => 'El correo electrónico no está registrado.']);
        }

        if (Hash::check($request->password, $usuario->Contraseña)) {
            Auth::login($usuario);
            //dd($usuario->Rol);
            if ($usuario->Rol === 'administrador') {
                return redirect()->route('admin.index')->with('success', 'Bienvenido Administrador ' . $usuario->Nombre . '!');
            } elseif ($usuario->Rol === 'usuario') {
                return redirect()->route('usuario.index')->with('success', 'Inicio de sesión exitoso. Bienvenido ' . $usuario->Nombre . '!');
            }

            Auth::logout();
            return back()->withErrors(['Rol' => 'El rol del usuario no está autorizado para iniciar sesión.']);
        } else {
            return back()->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    }

    


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('peliculas.index');
    }
}
