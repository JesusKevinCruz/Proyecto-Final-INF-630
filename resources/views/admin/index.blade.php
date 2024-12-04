<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Películas y Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #121212;
            color: #ffffff;
        }

        h1, h2 {
            text-align: center;
            margin: 20px 0;
            color: #00bcd4;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid #00bcd4;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .auth-buttons p {
            margin: 0;
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

        /* Navigation Tabs */
        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 80px 0 20px;
        }

        nav button {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #00bcd4;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav button:hover {
            background-color: #00bcd4;
            color: #121212;
        }

        /* Tab Content */
        .tab-content {
            display: none;
            margin: 20px;
        }

        .tab-content.active {
            display: block;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #1e1e1e;
            border-radius: 5px;
            overflow: hidden;
        }

        table thead {
            background: #00bcd4;
        }

        table thead th {
            text-align: left;
            padding: 10px;
            color: #ffffff;
        }

        table tbody tr {
            border-bottom: 1px solid #2e2e2e;
        }

        table tbody tr:hover {
            background: #2e2e2e;
        }

        table td {
            padding: 10px;
        }

        /* Buttons */
        a, button {
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
            color: #00bcd4;
            padding: 8px 15px;
            border: 1px solid #00bcd4;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover, button:hover {
            background-color: #00bcd4;
            color: #121212;
        }

        /* Chart */
/*         canvas {
            margin: 20px auto;
            display: block;
            max-width: 90%;
            background: #1e1e1e;
            padding: 10px;
            border-radius: 5px;
        } */

    </style>
    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
        }
    </script>
</head>
<body>

<header>
    <h1>Gestión de Películas y Usuarios</h1>
    <div class="auth-buttons">
        <p>Hola, {{ auth()->user()->Nombre ?? 'Administrador' }}</p>
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
    <nav>
        <button onclick="showTab('peliculas')">CRUD PELÍCULAS</button>
        <button onclick="showTab('usuarios')">LISTA DE USUARIOS</button>
        <button onclick="showTab('verpeliculas')">PELÍCULAS</button>
        <button onclick="showTab('reportes')">REPORTES Y ESTADISTICAS DE PELÍCULAS</button>
    </nav>

    <div id="peliculas" class="tab-content active">
        <a href="{{ route('peliculas.create') }}">Agregar Nueva Película</a>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Director</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                    <tr>
                        <td>{{ $pelicula->Titulo }}</td>
                        <td>{{ $pelicula->Director }}</td>
                        <td>{{ $pelicula->Año }}</td>
                        <td>
                            <a href="{{ route('peliculas.edit', $pelicula) }}">Editar</a>
                            <form action="{{ route('peliculas.destroy', $pelicula) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="usuarios" class="tab-content">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->Nombre }}</td>
                        <td>{{ $usuario->Email }}</td>
                        <td>{{ $usuario->Rol }}</td>
                        <td>{{ $usuario->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id="reportes" class="tab-content">
        <h2>Reportes de Películas</h2>
        <canvas id="peliculasChart"></canvas>
        <div>
        <br><br><br><br>
            <a href="" class="btn">Exportar a PDF</a>
            <a href="" class="btn">Exportar a Excel</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Director</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $pelicula)
                    <tr>
                        <td>{{ $pelicula->Titulo }}</td>
                        <td>{{ $pelicula->Director }}</td>
                        <td>{{ $pelicula->Año }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
            const peliculasPorAño = @json($peliculasPorAño);

            const años = peliculasPorAño.map(pelicula => pelicula.Año);
            const cantidades = peliculasPorAño.map(pelicula => pelicula.total);

            const ctx = document.getElementById('peliculasChart').getContext('2d');
            const peliculasChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: años, 
                    datasets: [{
                        label: 'Cantidad de Películas',
                        data: cantidades, 
                        backgroundColor: '#007bff',
                        borderColor: '#0056b3',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
</main>

</body>
</html>
