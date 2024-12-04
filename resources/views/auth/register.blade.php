<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-top: 20px;
        }

        .alert ul {
            margin: 0;
            padding: 0;
        }

        .alert ul li {
            list-style-type: none;
        }

        .alert ul li:before {
            content: '❌ ';
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Registro de Usuario</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Correo Electrónico:</label>
            <input type="email" id="Email" name="Email" value="{{ old('Email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="form-group">
            <label for="Rol">Rol:</label>
            <input type="text" id="Rol" name="Rol" value="usuario" readonly required>
        </div>
        <button type="submit">Registrar</button>
    </form>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

</body>
</html>
