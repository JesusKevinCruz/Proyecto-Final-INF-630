<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Recomendadas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #121212;
            color: #ffffff;
        }
        .logo img {
            height: 50px;
            width: auto;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-links a {
            color: #00bcd4;
            text-decoration: none;
            font-size: 16px;
        }
        .nav-links a:hover {
            color: #03a9f4;
        }
        .search {
            display: flex;
            align-items: center;
            background-color: #1e1e1e;
            border: 2px solid #00bcd4;
            border-radius: 8px;
            padding: 5px 10px;
            width: 300px;
            margin: 0 auto;
        }

        .search i {
            color: #00bcd4;
            font-size: 18px;
            margin-right: 10px;
        }

        .search input {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 16px;
        }

        .search input::placeholder {
            color: #b3b3b3;
        }

        .search input:focus {
            outline: none;
            color: #ffffff;
        }
        a {
            text-decoration: none;
            color: #00bcd4;
        }
        a:hover {
            color: #03a9f4;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            font-size: 24px;
            color: #00bcd4;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
        }

        .auth-buttons p {
            margin-right: 15px;
            color: #ffffff;
        }

        .auth-buttons button {
            background-color: #00bcd4;
            color: #ffffff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .auth-buttons button:hover {
            background-color: #039be5;
        }

        .container {
            margin-top: 100px;
            padding: 20px;
        }

        main {
            margin-top: 80px;
            padding: 20px;
        }
        .peliculas-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .pelicula-card {
            background: #1e1e1e;
            border: 1px solid #00bcd4;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .pelicula-card img {
            width: 100%;
            height: auto;
        }

        .pelicula-card .info {
            padding: 15px;
        }

        .pelicula-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #00bcd4;
        }

        .pelicula-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #b3b3b3;
        }

        .comentarios {
            padding: 15px;
            border-top: 1px solid #00bcd4;
        }

        .comentarios h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #00bcd4;
        }

        .comentarios textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #b3b3b3;
            border-radius: 5px;
            background: #121212;
            color: #ffffff;
            resize: none;
        }

        .comentarios button {
            background-color: #00bcd4;
            color: #ffffff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .comentarios button:hover {
            background-color: #039be5;
        }

        .comentarios .comentario {
            margin-top: 15px;
            padding: 10px;
            background: #292929;
            border-radius: 5px;
            color: #ffffff;
        }

        .comentarios .comentario p {
            margin: 0;
        }

        .comentarios .comentario small {
            font-size: 12px;
            color: #b3b3b3;
        }
        section {
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(to right, #121212, #1e1e1e);
            color: #ffffff;
            border-bottom: 2px solid #00bcd4;
        }

        section h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #00bcd4;
            text-transform: uppercase;
        }

        section p {
            font-size: 18px;
            line-height: 1.6;
            color: #b3b3b3;
            max-width: 800px;
            margin: 0 auto;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e1e;
            color: #b3b3b3;
            margin-top: 40px;
        }
        #platforms div a {
            transition: transform 0.3s ease, opacity 0.3s ease;
            text-decoration: none;
        }
        #platforms div a:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Artland Logo">
    </div>
    <nav class="nav-links">
        <a href="#nuevos">Nuevos</a>
        <a href="#popular">Popular</a>
        <a href="#series">Series</a>
    </nav>
    <div class="search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar...">
    </div>
    <div class="auth-buttons">

        <p>Hola, {{ $user1->Nombre ?? 'Usuario' }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
</header>

<main>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#00bcd4',
            });
        });
    </script>
    @endif

    <section>
        <h2>Tu guía de streaming para películas, series de TV y deportes</h2>
        <p>Descubre dónde ver nuevos contenidos, lo más popular y los próximos estrenos con Artland.</p>
    </section>
    <section id="platforms">
        <h2>Plataformas populares</h2>
        <div style="display: flex; justify-content: center; gap: 20px;">
            <a href="https://www.netflix.com/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Netflix" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.amazon.com/Prime-Video/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Prime_Video.png" alt="Amazon Prime Video" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.disneyplus.com/" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3e/Disney%2B_logo.svg" alt="Disney Plus" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.hbomax.com/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/HBO_Max_Logo.svg" alt="HBO Max" style="width: 100px; height: auto;">
            </a>
            <a href="https://vix.com/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/ViX_Logo.svg" alt="VIX" style="width: 100px; height: auto;">
            </a>
            <a href="https://pluto.tv/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/35/Pluto_TV_logo_2020.svg" alt="Pluto TV" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.crunchyroll.com/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f6/Crunchyroll_Logo.svg" alt="Crunchyroll" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.paramountplus.com/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Paramount_Pictures_Corporation_logo.svg" alt="Paramount Plus" style="width: 100px; height: auto;">
            </a>
            <a href="https://www.magictv.app/" target="_blank">
                <img src="https://www.publico.es/vpn/wp-content/uploads/2024/07/channels4_profile-150x150.jpg" alt="Magic TV" style="width: 100px; height: auto;">
            </a>
        </div>
    </section>

    <div class="container">
        <div class="peliculas-container">
            @foreach ($peliculas as $pelicula)
                <div class="pelicula-card">
                    <a href="https://www.youtube.com/watch?v=w-xLg8ll2U4={{ $pelicula->youtube_id }}" target="_blank">
                        <img src="{{ asset('storage/' . $pelicula->imagen) }}" alt="{{ $pelicula->Titulo }}">
                    </a>
                    <div class="info">
                        <h3>{{ $pelicula->Titulo }}</h3>
                        <p>{{ $pelicula->Sinopsis }}</p>
                        <p><strong>Calificación:</strong> {{ $pelicula->Calificacion }} / 5</p>
                        <p><strong>Director:</strong> {{ $pelicula->Director }}</p>
                        <p><strong>Año:</strong> {{ $pelicula->Año }}</p>
                        <p><strong>Género:</strong> {{ $pelicula->Genero }}</p>
                    </div>
                    <div class="comentarios">
                        <h4>Comentarios:</h4>
                        <form action="{{ url('/pelicula/' . $pelicula->id . '/comentario') }}" method="POST">
                            @csrf
                            <textarea name="comentario" rows="4" placeholder="Escribe tu comentario..." required></textarea>
                            <button type="submit">Comentar</button>
                        </form>
                        @foreach ($pelicula->comentarios as $comentario)
                            <div class="comentario">
                                <p><strong>{{ $comentario->usuario->Nombre }}:</strong> {{ $comentario->Comentario }}</p>
                                <small>Publicado el: {{ \Carbon\Carbon::parse($comentario->Fecha)->format('d-m-Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
<footer class="footer">
    <p>&copy; 2024 Artland. Todos los derechos reservados.</p>
</footer>
</body>
</html>
