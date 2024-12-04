<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 80%;
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 36px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    label {
        font-size: 18px;
        color: #333;
        display: block;
        margin: 10px 0 5px;
    }

    input[type="text"], input[type="number"], textarea, input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 16px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }

    input[type="text"]:focus, input[type="number"]:focus, textarea:focus, input[type="file"]:focus {
        border-color: #007bff;
        background-color: #e8f4ff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 14px;
        font-size: 18px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    button:active {
        background-color: #1e7e34;
        transform: translateY(2px);
    }

    textarea {
        resize: vertical;
        height: 150px;
    }

    input, textarea, button {
        margin-bottom: 15px;
    }

    form {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
    }

    input[type="file"]::before {
        content: "Seleccionar nueva imagen";
        padding: 10px;
        background-color: #007bff;
        color: white;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
    }

    input[type="file"]:hover::before {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h1>Editar Película</h1>

    <form action="{{ route('peliculas.update', $pelicula) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ $pelicula->Titulo }}" required>

        <label for="director">Director</label>
        <input type="text" name="director" id="director" value="{{ $pelicula->Director }}" required>

        <label for="año">Año</label>
        <input type="number" name="año" id="año" value="{{ $pelicula->Año }}" required>

        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" value="{{ $pelicula->Genero }}" required>

        <label for="sinopsis">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" required>{{ $pelicula->Sinopsis }}</textarea>

        <label for="calificacion">Calificación</label>
        <input type="number" name="calificacion" id="calificacion" value="{{ $pelicula->Calificacion }}" min="0" max="5" step="0.1" required>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen">

        <button type="submit">Actualizar Película</button>
    </form>
</div>

