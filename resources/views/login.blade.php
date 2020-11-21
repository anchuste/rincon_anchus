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
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar sesión</h5>
            <form class="form-signin" action="{{url('iniciarSesion')}}" method="post">
            @csrf
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="form-label-group" style="margin-top: 1.65em;">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
              </div>
              <div style="margin-top: 3em">
                <button class="btn btn-lg btn-dark btn-block text-uppercase btn_iniciar_sesion" type="submit">Iniciar sesión</button>
              </div>
              <a class="d-block text-center mt-2 small" href="#">Registrar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</html>