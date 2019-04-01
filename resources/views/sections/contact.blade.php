@extends('layouts.app')
@section('content')
<!-- ***** Breadcumb Area Start ***** -->
  <div class="breadcumb_area bg-img background-overlay-white" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->
<div class="message_now_area section_padding_100" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="contact_from">
                    <form action="/sendmail" method="post">
                        {{csrf_field()}}
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div id="success_fail_info"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="f_name" id="name" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="l_name" id="surname" placeholder="Apellido" required>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Tu email" required>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select w-100">
                                          <option selected>Asunto</option>
                                         <option value="1">Revendedor</option> -->
                                          <!-- <option value="2">Nueva coleccion</option> 
                                          <option value="3">Consulta general</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Tu Mensaje *" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn bigshop-btn">Enviar Mensaje</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->

<!-- Map Area Start -->
{{-- <div id="googleMap"></div> --}}

@endsection
@section('footer')

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
                            <p>Valenclothes, Todo lo que buscas.. en un solo lugar</p>
                          <!--  <p>Movil: +54 387 xxxxxx</p> -->
                            <p>Email: contacto@valenclothes.com.ar</p>
                        </div>
                        <div class="footer_social_area mt-15">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <!--    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a> -->
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
                            <p>Sitio desarrollado por <a href="#">Via Digital</a></p>
                        </div>
                    </div>
                    <!-- Payment Method -->
                    <div class="col-12 col-md">
                        <div class="payment_method text-right">
                            <img src="/img/payment-method/visa.png" alt="">
                            <!--<img src="/img/payment-method/maestro.png" alt="">
                            <img src="/img/payment-method/western-union.png" alt="">
                            <img src="/img/payment-method/discover.png" alt="">
                            <img src="/img/payment-method/american-express.png" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->
@endsection