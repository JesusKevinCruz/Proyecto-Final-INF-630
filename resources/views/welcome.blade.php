<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Recomendadas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            background-color: #121212;
        }
        .logo img {
            height: 50px;
            width: auto;
        }
        .search {
            display: flex;
            align-items: center;
            background-color: #1e1e1e;
            border: 2px solid #00bcd4;
            border-radius: 8px;
            padding: 5px 10px;
            width: 300px;
            margin: 0 auto; /* Centrar si es necesario */
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
        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }
        header h1 {
            font-size: 20px;
            margin: 0;
            color: #ffffff;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        /* Main content */
        main {
            margin-top: 80px;
            padding: 20px;
        }
        .peliculas-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .pelicula-card {
            background-color: #1e1e1e;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
        }
        .pelicula-card img {
            width: 100%;
            height: auto;
        }
        .pelicula-card .info {
            padding: 15px;
        }
        .pelicula-card h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #ffffff;
        }
        .pelicula-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #b3b3b3;
        }
        .comentarios {
            margin-top: 10px;
        }
        .comentarios h4 {
            font-size: 16px;
            color: #ffffff;
        }
        .comentario {
            margin-top: 5px;
            border-left: 2px solid #00bcd4;
            padding-left: 10px;
            color: #b3b3b3;
        }
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e1e;
            color: #b3b3b3;
            margin-top: 40px;
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
        <a href="{{ route('register') }}">Registrar</a>
        <a href="{{ route('login') }}">Iniciar sesión</a>
    </div>
</header>
<main>
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
    <section class="peliculas-container" id="nuevos">
        @foreach ($peliculas as $pelicula)
        <div class="pelicula-card">
            <img src="{{ asset('storage/' . $pelicula->imagen) }}" alt="{{ $pelicula->Titulo }}">
            <div class="info">
                <h3>{{ $pelicula->Titulo }}</h3>
                <p>{{ $pelicula->Sinopsis }}</p>
                <p><strong>Calificación:</strong> {{ $pelicula->Calificacion }} / 5</p>
                <p><strong>Director:</strong> {{ $pelicula->Director }}</p>
                    <p><strong>Año:</strong> {{ $pelicula->Año }}</p>
                    <p><strong>Género:</strong> {{ $pelicula->Genero }}</p>

                    <div class="comentarios">
                        <h4>Comentarios:</h4>
                        @foreach ($pelicula->comentarios as $comentario)
                            <div class="comentario">
                                <p><strong>{{ $comentario->usuario->Nombre }}:</strong> {{ $comentario->Comentario }}</p>
                                <small>Publicado el: {{ \Carbon\Carbon::parse($comentario->Fecha)->format('d-m-Y') }}</small>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
        @endforeach
    </section>
</main>
<footer class="footer">
    <p>&copy; 2024 Artland. Todos los derechos reservados.</p>
</footer>
</body>
</html>
