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

    <form class="form-signin" action="{{ url('procesarPedido/')}}" method="post">
    @csrf
    <div class="container" style="margin-top: 3em">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                <h3 class="card-title text-center">INFORMACIÓN PARA REALIZAR PEDIDO</h3>
            </div>
            <hr>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto ">
                <input type="text" id="inputNombre" class="form-control custom_text_pedido" placeholder="nombre" name="nombre" value="{{ $clienteRecuperado[0]['nombre'] ?? '' }}" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto ">
                <input type="text" id="inputApellido" class="form-control custom_text_pedido" placeholder="apellidos" name="apellidos" value="{{ $clienteRecuperado[0]['apellidos'] ?? '' }}" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto">
                <input type="email" id="inputEmail" class="form-control custom_text_pedido" placeholder="email" name="email" value="{{ $clienteRecuperado[0]['mail'] ?? '' }}" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto" >
                <input type="text" id="inputTelefono" class="form-control custom_text_pedido" placeholder="telefono" name="telefono" value="{{ $clienteRecuperado[0]['telefono'] ?? '' }}" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto">
                <input type="text" id="inputDireccion" class="form-control custom_text_pedido" placeholder="direccion" name="direccion" value="{{ $clienteRecuperado[0]['direccion'] ?? '' }}" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mx-auto finaliza_pedido_btn">
            <button type="submit" class="btn btn-secondary btn-lg">Finalizar pedido</button>
            </div>
        </div>
    </div>
    </form>

</html>