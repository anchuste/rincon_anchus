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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Iniciar sesión</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Registrar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 3em">
        <h1 class="card-title text-center"> ¡Enhorabuena, el pedido se ha realizado correctamente!</h1>
        <h2 class="card-title text-center"> ¡Muchas gracias por confiar en nososotros! <h2>
        <hr>
        <h4 class="card-title text-center"> En breve recibirá un correo electrónico con la factura del pedido <h4>
    </div>
    <div class="row" style="heigth: 4em; margin-top: 0.15em">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto" style="text-align: right">
            <button type="button" onclick="location.href='{{ url('realizarPedido/')}} '"class="btn btn-secondary btn-lg">Ir a mis pedidos</button>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto">
            <button type="button" onclick="location.href='{{ url('welcome/')}} '" class="btn btn-secondary btn-lg">Seguir comprando</button>
        </div>
    </div>
</html>