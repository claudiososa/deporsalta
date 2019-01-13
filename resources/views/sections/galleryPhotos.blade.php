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