<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


</head>
<body>
    <div id="app" class="container">
        <nav class="navbar navbar-light static-top navbar-toggleable-md bg-faded">
            <div class="container">

              <a class="navbar-brand" href="{{ url('/') }}">
                  Deportiva Salta
              </a>


              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                          <li class="nav-item">
                            <a class="nav-link" href="/catalogo">Catalogo</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/aboutUs">Quienes Somos</a>
                          </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                        @else
                          <li  class="nav-item dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrator</a>
                              <div class="dropdown-menu" role="menu">
                                <a href="/product/create">Nuevo Producto</a>
                                <a href="/products">Mostrar Productos</a>
                                <a href="/category/create">Nueva Categoria</a>
                                <a href="/viewcategory">Mostrar Categorias</a>
                                <a href="/colour/create">Nueva Color</a>
                                <a href="/viewcolour">Mostrar Colores</a>
                                <a href="/brand/create">Nueva Marca</a>
                                <a href="/viewbrand">Mostrar Marcas</a>
                                <a href="/waist/create">Nuevo Talles</a>
                                <a href="/viewwaist">Mostrar Talles</a>
                              </div>
                            </li>
                              <li  class="nav-item dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu" role="menu">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Salir
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>

                              </div>
                          </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
