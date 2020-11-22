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
    <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5" style="height: 24em;">
          <div class="card-img-producto d-none d-md-flex" style="background: scroll center url(../../resources/images/switch_dragon_quest.jpg); background-repeat: no-repeat;
                background-size: cover;">                                         
          </div>
          <div class="card-body">
            <h4 class="card-title text-center">COMPRAR</h4>
            <hr>
            <h3 class="card-title text-right">{{ $productoAsArray[0]['nombre'] ?? '' }}</h3>
            <h1 class="text-right" style="font-size: 4.25em">{{ $productoAsArray[0]['precio'] ?? '' }} €</h1>
            <p class="card-text">{{ $productoAsArray[0]['descripcion'] ?? '' }}</p>
            <div style="margin-top: 3em">
                <button class="btn btn-lg btn-dark btn-block text-uppercase btn_iniciar_sesion" type="submit">Añadir al carrito</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</html>