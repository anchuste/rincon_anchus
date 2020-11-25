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
        <a class="navbar-brand" href="{{ url('/welcome') }}">La tiendecita de Anchus</a>
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
                if(!isset($_SESSION)) { session_start(); } 
                if(isset($_SESSION["userSession"])) {
                    echo '<li class="nav-item"> <h6 style="color:white; margin-top: 0.7rem;"> ¡Bienvenido '.$_SESSION["userSession"].'!</h6></li>';
                }
                ?>


                <?php
                if(!isset($_SESSION)) { session_start(); } 
                if(!isset($_SESSION["userSession"])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login/welcome') }}">Iniciar sesión</a>
                </li>
                <?php
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/carrito') }}">Carrito</a>
                </li>

                <!--
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Registrar</a>
                </li>-->

                <?php
                if(!isset($_SESSION)) { session_start(); } 
                if(isset($_SESSION["userSession"])) {
                    ?>
                   <li class="nav-item"> <a class="nav-link" href="{{ url('/salirSesion') }}"> Mis pedidos </a></li>
                   <?php
                }
                ?>

                <?php
                if(!isset($_SESSION)) { session_start(); } 
                if(isset($_SESSION["userSession"])) {
                    ?>
                   <li class="nav-item"> <a class="nav-link" href="{{ url('/salirSesion') }}"> Salir </a></li>
                   <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="custom_carousel" src="../resources/images/cyberpunk2077.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="custom_carousel" src="../resources/images/CIV6.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="custom_carousel" src="../resources/images/zelda.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row" style="margin-top: 0.65em;">
        @foreach($categorias as $categoria)
        <div class="col-12 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <img class="img_categoria" src="../resources/images/{{ $categoria->imagen_path ?? '' }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->nombre ?? '' }}</h5>
                    <p class="card-text">{{ $categoria->descripcion ?? '' }}</p>
                    <a href="{{ url('productoscategoria/' .$categoria->id_categoria )}}" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>