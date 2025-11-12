<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Laravel')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #e83e8c;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">OXXO Proyecto</a>
            <div>
                <a class="nav-link d-inline text-white" href="{{ route('productos.index') }}">Productos</a>
                <a class="nav-link d-inline text-white" href="{{ route('turnos.index') }}">Turnos</a>
            </div>
        </div>
    </nav>

<div class="container">
    @yield('contenido')
</div>


</body>
</html>
