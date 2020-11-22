<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tienda Anchus</title>

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">La tiendecita de Anchus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/welcome') }}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php
                session_start();
                if(isset($_SESSION["userSession"])) {
                    echo '<li class="nav-item"> <h6 style="color:white; margin-top: 0.7rem;">'.$_SESSION["userSession"].'</h6></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login/welcome') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Registrar</a>
                </li>
                
            </ul>
        </div>
    </nav>

    

    <div class="row" style="margin-top: 0.65em;">
        @foreach($productos as $producto)
        <div class="col-12 col-md-2 col-sm-12 col-xs-12">
            <div class="card" style="width: 15em">
                <img class="img_producto" src="../../resources/images/{{ $producto->imagen_path ?? '' }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre ?? '' }}</h5>
                    <h5>Precio: {{ $producto->precio ?? '' }} €</h5>
                    <a href="{{ url('detalleproducto/' .$producto->id_producto )}}" class="btn btn-dark stretched-link">¡Comprar! </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>