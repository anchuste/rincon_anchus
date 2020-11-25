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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/welcome') }}">Categorías</a>
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
                   <li class="nav-item"> <a class="nav-link"> Mis pedidos </a></li>
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
    <div class="container" style="margin-top: 3em">
    <?php
            if(!isset($_SESSION)) { session_start(); } 
            if(isset($_SESSION["cart"])) {
        ?>
    <div class="row" style="heigth: 4em; margin-top: 0.15em">
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h4 class="card-title text-center"> Producto </h4>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h4 class="card-title text-center"> Nombre</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h4 class="card-title text-center"> Unidades </h4>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h4 class="card-title text-center"> Precio </h4>
            </div>
    </div>
        
        @foreach($productosCarro as $producto)
        <hr>
        <div class="row" style="heigth: 4em; margin-top: 0.15em">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mx-auto" style="text-align:center">
                <img height="75%" width="50%" src="{{'../resources/images/' . $producto[0]['imagen_path'] }}" alt="" />
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mx-auto " style="margin-top: 2em">
                <h4 class="card-title text-center"> {{ $producto[0]['nombre'] ?? '' }}</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h4 class="card-title text-center"> 1 </h4>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 mx-auto" style="margin-top: 2em">
                <h3 class="card-title text-center"> {{ $producto[0]['precio'] ?? '' }} € </h3>
            </div>
        </div>
        @endforeach
        <?php
        }
        ?>
        <?php
            if(!isset($_SESSION)) { session_start(); } 
            if(!isset($_SESSION["cart"])) {
        ?>
        <h1 class="card-title text-center"> El carrito de la compra está vacío.</h1>
        <h2 class="card-title text-center" style="margin-top: 1.0em"> ¡Anímate y empieza a llenarlo! <h2>
        <?php
            }
        ?>
    </div>
    <?php
            if(!isset($_SESSION)) { session_start(); } 
            if(!isset($_SESSION["cart"])) {
        ?>
    <div class="row" style="heigth: 4em; margin-top: 0.15em">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto" style="text-align: center; margin-top: 1.0em">
            <button type="button" onclick="location.href='{{ url('welcome/')}} '"class="btn btn-secondary btn-lg">Empezar a comprar</button>
        </div>
    </div>
    <?php
            }
        ?>
    <?php
            if(!isset($_SESSION)) { session_start(); } 
            if(isset($_SESSION["cart"])) {
        ?>
    <div class="row" style="heigth: 4em; margin-top: 0.15em">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto" style="text-align: right; margin-top: 1.0em">
            <button type="button" onclick="location.href='{{ url('welcome/')}} '"class="btn btn-secondary btn-lg">Seguir comprando</button>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto" style="text-align: left; margin-top: 1.0em">
            <button type="button" onclick="location.href='{{ url('realizarPedido/')}} '"class="btn btn-secondary btn-lg">Realizar pedido</button>
        </div>
    </div>
    <?php
            }
        ?>
</html>