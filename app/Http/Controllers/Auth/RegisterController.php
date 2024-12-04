<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;  // Asegúrate de que apunte a tu modelo 'Usuario'
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Procesar el registro
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Crear el usuario
        $user = $this->create($request->all());

        // Iniciar sesión automáticamente después del registro
        event(new Registered($user));
        Auth::login($user);

        // Redirigir después del registro
        return redirect()->route('peliculas.index');
    }

    // Validador de los datos del formulario
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nombre' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Rol' => ['required', 'string', 'max:30'],
        ]);
    }

    // Crear un nuevo usuario
    protected function create(array $data)
    {
        return Usuario::create([
            'Nombre' => $data['Nombre'],
            'Email' => $data['Email'],
            'password' =>  $data['password'],
            'Rol' => $data['Rol'],
        ]);
    }
}
