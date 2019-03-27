@extends('layouts.app')
@section('content')
<br>
<section class="main-container">
  <div class="container">
    <div class="row">

      <!-- main start -->
      <!-- ================ -->
      <div class="main col-md-12">

        <!-- page-title start -->
        <!-- ================ -->
        <h2 class="page-title">Galería de Fotos</h2>
        <div class="separator-2"></div>
        <!-- page-title end -->

        <!-- Image Boxes start -->
        <!-- ============================================================================== -->
        @foreach ($albums as $album)
        <br>
        <h2><span class="bigshop-label bigshop-label-danger">{{$album->name}}</span></h2>        
        <br>
        <div class="row">
          @foreach ($album->Photos as $photo)
          <div class="col-sm-4">
            <div class="image-box shadow text-center mb-20">
              <div class="overlay-container overlay-visible">
                <img src="{{Storage::disk('public')->url($photo->imageSmall)}}" alt="">
                <a href="{{Storage::disk('public')->url($photo->image)}}" class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                {{-- <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a> --}}
                {{-- <div class="overlay-bottom hidden-xs">
                  <div class="text">
                    <p class="lead margin-clear">Image caption lorem ipsum</p>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          @endforeach
          {{-- <div class="col-sm-4">
            <div class="image-box shadow text-center mb-20">
              <div class="overlay-container overlay-visible">
                <img src="images/portfolio-5.jpg" alt="">
                <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>
                <div class="overlay-bottom hidden-xs">
                  <div class="text">
                    <p class="lead margin-clear">Image caption lorem ipsum</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="image-box shadow text-center mb-20">
              <div class="overlay-container overlay-visible">
                <img src="images/portfolio-6.jpg" alt="">
                <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>
                <div class="overlay-bottom hidden-xs">
                  <div class="text">
                    <p class="lead margin-clear">Image caption lorem ipsum</p>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      @endforeach

        <br>
      </div>
      <!-- main end -->

    </div>
  </div> <!-- container end -->
</section> <!-- section end -->

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