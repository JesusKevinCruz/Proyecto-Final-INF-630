
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
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    button:active {
        background-color: #004085;
        transform: translateY(2px);
    }

    textarea {
        resize: vertical;
        height: 150px;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    form {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
    }

    input, textarea, button {
        margin-bottom: 15px;
    }

</style>

<div class="container">
    <h1>Agregar Nueva Película</h1>

    <form action="{{ route('peliculas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="director">Director</label>
        <input type="text" name="director" id="director" required>

        <label for="año">Año</label>
        <input type="number" name="año" id="año" required>

        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" required>

        <label for="sinopsis">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" required></textarea>

        <label for="calificacion">Calificación</label>
        <input type="number" name="calificacion" id="calificacion" min="0" max="5" required>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen">

        <button type="submit">Crear Película</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

