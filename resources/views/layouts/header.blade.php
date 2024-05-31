<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de Música</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Custom CSS (opcional) -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            display: flex;
        }

        aside {
            width: 250px;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DJ-Music</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            @if (auth()->check()) href="{{ route('home.index') }}"
                        @else
                            href="{{ route('welcome') }}" @endif>Inicio</a>
                    </li>

                    @if (auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                                <li><a class="dropdown-item btn-danger" href="{{ route('logout.index') }}">Cerrar
                                        sesión</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.index') }}">Iniciar sesión</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactos</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
