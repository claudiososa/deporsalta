<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="ValenClothes" content="Ropa para mujer">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Valenclothes | Ropa para mujer.</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Responsive CSS -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!-- CSRF Token -->    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<!-- <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head> -->
<body>
      <!-- ***** Header Area Start ***** -->
      <header class="header_area">
        <!-- Top Header Area Start -->
        <div class="top_header_area">
            <div class="container h-100">
                <div class="row d-md-flex h-100 align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="top_single_area d-sm-flex align-items-center">
                            <!-- Top Mail Area Start -->
                            {{-- <div class="top_mail mr-5">
                                <a class="align-middle" href="mailto:paty.sugelli@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> paty.sugelli@gmail.com</a>
                            </div> --}}
                            <!-- Top Social Area Start -->
                            <div class="top_social">
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="top_single_area d-sm-flex align-items-center justify-content-end">
                            <!-- Login Area Start -->
                            <div class="login_area">
                                <p><a href="/login"><i class="fa fa-lock" aria-hidden="true"></i> Login</a> 
                                    <!-- <a href="register.html" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> Create an account</a> -->
                                </p>    
                            </div>
                            <!-- Get Support -->
                            <!-- <div class="get_help">
                                <a href="faq.html" target="_blank"><i class="fa fa-life-ring" aria-hidden="true"></i></a>
                            </div> -->
                            <!-- Language Area Start -->
                            <!-- <div class="language_area">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">$USD</button>
                                    <div class="dropdown-menu" aria-labelledby="lang">
                                        <a class="dropdown-item" href="#">$AUD</a>
                                        <a class="dropdown-item" href="#">€EUR</a>
                                        <a class="dropdown-item" href="#">$CSD</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Bottom Header Area Start -->
        <div class="bottom-header-area" id="stickyHeader">
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Logo Area Start -->
                        <div class="col-6 col-md-3">
                            <div class="logo_area">
                                <a href="/">Deportiva Salta</a>
                            </div>
                        </div>
                        <!-- Search Area Start -->
                        {{-- <div class="col-12 col-md-6">
                            <div class="hero_search_area">
                                <form action="#" method="get">
                                    <input type="search" class="form-control" id="search" aria-describedby="search" placeholder="Buscador de productos, talle o categoria">
                                    <button type="submit" class="btn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div> --}}
                        <!-- Hero Meta Area Start -->
                        <div class="col-6 col-md-3">
                            <div class="hero_meta_area d-flex text-right align-items-center justify-content-end">                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mainmenu_area">
                <div class="container">
                    <nav id="bigshop-nav" class="navigation">
                        <!-- Authentication Links -->
                        <!-- Logo Area Start -->
                        <div class="nav-header">
                            <div class="nav-toggle"></div>
                        </div>
                        <!-- Nav Text Area Start -->
                        <span class="nav-text align-to-right"><i class="ti-headphone-alt"></i> +54 387 xxxxxxx</span>

                        @if (Auth::guest())
                            <!-- Main Menus Wrapper -->
                            <div class="nav-menus-wrapper">
                                <ul class="nav-menu">
                                <li><a href="/">Inicio</a></li>
                                    <li><a href="/aboutUs" >Quienes somos</a></li>
                                    <li><a href="/catalogo" >Catálogo</a></li>
                                    <li><a href="/fotos" >Galería de Fotos</a></li>
                                    <li><a href="/contacto" >Contactanos</a></li>                    
                                
                                </ul>
                            </div>                    
                        @else
                            <div class="nav-menus-wrapper">
                                <ul class="nav-menu">                                
                                    <li><a href="#">Administrador</a>
                                        <ul class="nav-dropdown">
                                            <li><a href="/productsale">Realizar Venta</a></li>
                                            <li><a href="/sale/list">Ventas realizadas</a></li>
                                            <li><a href="/products">Mostrar Productos</a></li>                                            
                                            <li><a href="/product/selectcategory">Nuevo Producto</a></li>
                                            <li><a href="/galeria">Admin Galeria de Fotos</a></li>
                                            <li><a href="/category/create">Nueva Categoria</a></li>
                                            <li><a href="/viewcategory">Mostrar Categorias</a></li>
                                            <li><a href="/colour/create">Nueva Color</a></li>
                                            <li><a href="/viewcolour">Mostrar Colores</a></li>
                                            <li><a href="/brand/create">Nueva Marca</a></li>
                                            <li><a href="/viewbrand">Mostrar Marcas</a></li>
                                            <li><a href="/waist/create">Nuevo Talles</a></li>
                                            <li><a href="/viewwaist">Mostrar Talles</a></li>
                                        </ul>    
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
                                </ul>
                            </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area End -->
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- <div class="container">      -->
        @yield('content')
    <!-- </div> -->
     
    <footer class="footer_area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Single Footer Area Start -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>Sobre nosotros</h6>
                        </div>
                        <div class="footer_content">
                            <p>Deportiva Salta, es un emprendimiento que busca satisfacer la necesidad de usar ropa deportiva de calidad.</p>
                            <p>Movil: +54 387 4152010</p>
                            <p>Email: paty.sugelli@gmail.com</p>
                        </div>
                        <div class="footer_social_area mt-15">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Area Start -->
                <div class="col-12 col-md-6 col-lg">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>Account Information</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Login</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Inicio</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Quienes somos</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Catálogo</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Galería de fotos</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contactenos</a></li>                            
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Area Start -->
                {{-- <div class="col-12 col-md-6 col-lg">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>Support</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Help</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Product Support</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Terms &amp; Conditions</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Privacy Policy</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Payment Method</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Affiliate Proggram</a></li>
                        </ul>
                    </div>
                </div> --}}
                <!-- Single Footer Area Start -->
                <div class="col-12 col-md-6 col-lg">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>Recibe novedades en tu email</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Tu dirección de E-mail">
                                <button type="submit" class="submit"><i class="ti-check" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="single_footer_area mt-30">
                        <div class="footer_heading mb-15">
                            <h6>Download our Mobile Apps</h6>
                        </div>
                        <div class="apps_download">
                            <a href="#"><img src="img/core-img/play-store.png" alt="Play Store"></a>
                            <a href="#"><img src="img/core-img/app-store.png" alt="Apple Store"></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class="footer_bottom_area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Content -->
                    <div class="col-12 col-md">
                        <div class="copywrite_text text-left d-flex align-items-center">
                            <p>Sitio desarrollado por <a href="#">Hosting Salta</a></p>
                        </div>
                    </div>
                    <!-- Payment Method -->
                    <div class="col-12 col-md">
                        <div class="payment_method text-right">
                            <img src="/img/payment-method/paypal.png" alt="">
                            <img src="/img/payment-method/maestro.png" alt="">
                            <img src="/img/payment-method/western-union.png" alt="">
                            <img src="/img/payment-method/discover.png" alt="">
                            <img src="/img/payment-method/american-express.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    
    
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>   

</body>
</html>
