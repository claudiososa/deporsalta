@extends('layouts.app')
@section('content')
      <!-- ***** Welcome Slides Area Start ***** -->
      <section class="welcome_area home-2">
        <div class="welcome_slides">

            <!-- Single Slide Start -->
            <div class="single_slide home-3 height-700 bg-img background-overlay" style="background-image: url(img/bg-img/slide-4.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text">
                                <p class="text-white" data-animation="fadeInUp" data-delay="0">hot fashion</p>
                                <h2 class="text-white" data-animation="fadeInUp" data-delay="300ms">Summer Collection</h2>
                                <a href="#" class="btn buy-now" data-animation="fadeInUp" data-delay="600ms">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide Start -->
            <div class="single_slide home-3 height-700 bg-img background-overlay" style="background-image: url(img/bg-img/slide-5.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text">
                                <p class="text-white" data-animation="fadeInLeftBig" data-delay="0">Latest Trends</p>
                                <h2 class="text-white" data-animation="fadeInLeftBig" data-delay="300ms">New Hats 2018</h2>
                                <a href="#" class="btn buy-now" data-animation="fadeInLeftBig" data-delay="600ms">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide Start -->
            <div class="single_slide home-3 height-700 bg-img background-overlay-white" style="background-image: url(img/bg-img/slide-6.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text">
                                <p data-animation="slideInDown" data-delay="600ms">Todays Deals <i class="ti-heart"></i></p>
                                <h2 data-animation="slideInDown" data-delay="300ms">Women Fashion</h2>
                                <a href="#" class="btn buy-now" data-animation="slideInDown" data-delay="0">Check Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Welcome Slides Area End ***** -->

      <!-- ***** Shop Catagory Area Start ***** -->
      <section class="shop_by_catagory_area section_padding_100_0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md">
                    <div class="single_catagory">
                        <a href="#">
                            <img class="img-fluid" src="img/bg-img/cat-1.jpg" alt="">
                            <div class="single_cata_desc">
                                <div class="bigshop-table">
                                    <div class="bigshop-table-cell">
                                        <h5><span>Women</span>Hot Collection</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="single_catagory">
                        <a href="#">
                            <img src="img/bg-img/cat-2.jpg" alt="">
                            <div class="single_cata_desc">
                                <div class="bigshop-table">
                                    <div class="bigshop-table-cell">
                                        <h5><span>Men</span>Summer Collection</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="single_catagory">
                        <a href="#">
                            <img src="img/bg-img/cat-3.jpg" alt="">
                            <div class="single_cata_desc">
                                <div class="bigshop-table">
                                    <div class="bigshop-table-cell">
                                        <h5><span>Kids</span>Up to 75% off</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Shop Catagory Area End ***** -->

        <!-- ***** Quick View Modal Area Start ***** -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img class="first_img" src="img/product-img/new-1-back.png" alt="">
                                        <img class="hover_img" src="img/product-img/new-1.png" alt="">
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="#"><i class="ti-stats-up"></i></a>
                                        </div>
                                    </form>
                                    <div class="share_wf mt-30">
                                        <p>Share With Friend</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Quick View Modal Area End ***** -->

    <!-- ***** Best Rated/Onsale/Top Sale Area Start ***** -->
    <section class="best_rated_onsale_top_sellares home-2 section_padding_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs_area">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            <li class="nav-item">
                                <a href="#top-sellers" class="nav-link active" data-toggle="tab" role="tab">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a href="#best-rated" class="nav-link" data-toggle="tab" role="tab">Best Rated</a>
                            </li>
                            <li class="nav-item">
                                <a href="#on-sale" class="nav-link" data-toggle="tab" role="tab">Featured</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="top-sellers">
                                <div class="top_sellers_area">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/1.jpg" alt="Top-Sellers">
                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Blouses &amp; Shirts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/2.jpg" alt="Top-Sellers">
                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Women's Romper</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/3.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wedding Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/4.jpg" alt="Top-Sellers">
                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Flower Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/5.jpg" alt="Top-Sellers">
                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Shorts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/6.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Leggings</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/7.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Parkas</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/8.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wayfarer SUNGLASSES</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="best-rated">
                                <div class="best_rated_area">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/9.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Blouses &amp; Shirts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/10.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Women's Romper</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/11.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wedding Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/12.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Flower Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/13.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Shorts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/14.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Leggings</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/15.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Parkas</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/16.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wayfarer SUNGLASSES</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="on-sale">
                                <div class="on_sale_area">
                                    <div class="row">

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/17.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Blouses &amp; Shirts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/18.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Women's Romper</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/19.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wedding Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/20.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Flower Dresses</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/21.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Shorts</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/22.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Leggings</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/23.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Parkas</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="img/product-img/24.jpg" alt="Top-Sellers">

                                                    <!-- Wishlist -->
                                                    <div class="product_wishlist">
                                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="product_compare">
                                                        <a href="#" title="Compare"><i class="ti-stats-up"></i></a>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart">
                                                        <a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5><a href="#">Wayfarer SUNGLASSES</a></h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Best Rated/Onsale/Top Sale Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="blog_area home-2 section_padding_0_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular_section_heading mb-30">
                        <h5>Latest From the Blog</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <img src="img/bg-img/blog-1.jpg" alt="blog-post-thumb">
                        </div>
                        <div class="blog_post_content">
                            <div class="blog_text_area">
                                <h4 class="blog_title"><a href="#">Fashion carnival was held</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque vero pariatur quae earum voluptates numquam nihil consequuntur vel illo veniam?</p>
                                <a href="#">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <img src="img/bg-img/blog-2.jpg" alt="blog-post-thumb">
                        </div>
                        <div class="blog_post_content">
                            <div class="blog_text_area">
                                <h4 class="blog_title"><a href="#">Fashion with handy bag</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque vero pariatur quae earum voluptates numquam nihil consequuntur vel illo veniam?</p>
                                <a href="#">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Special Featured Area Start ***** -->
    <section class="home-2 special_feature_area d-md-flex align-items-center">

        <!-- Single Feature Area -->
        <div class="single_feature_area d-flex align-items-center justify-content-center">
            <div class="feature_icon">
                <i class="ti-truck"></i>
                <span><i class="ti-check" aria-hidden="true"></i></span>
            </div>
            <div class="feature_content">
                <h6>FREE SHIPPING</h6>
                <p>For orders above $100</p>
            </div>
        </div>

        <!-- Single Feature Area -->
        <div class="single_feature_area d-flex align-items-center justify-content-center">
            <div class="feature_icon">
                <i class="ti-headphone-alt"></i>
                <span><i class="ti-check" aria-hidden="true"></i></span>
            </div>
            <div class="feature_content">
                <h6>Customer Care</h6>
                <p>24/7 Friendly Support</p>
            </div>
        </div>

        <!-- Single Feature Area -->
        <div class="single_feature_area d-flex align-items-center justify-content-center">
            <div class="feature_icon">
                <i class="ti-back-left"></i>
                <span><i class="ti-check" aria-hidden="true"></i></span>
            </div>
            <div class="feature_content">
                <h6>Happy Returns</h6>
                <p>7 Days free Returns</p>
            </div>
        </div>

        <!-- Single Feature Area -->
        <div class="single_feature_area d-flex align-items-center justify-content-center">
            <div class="feature_icon">
                <i class="ti-credit-card"></i>
                <span><i class="ti-check" aria-hidden="true"></i></span>
            </div>
            <div class="feature_content">
                <h6>100% Money Back</h6>
                <p>If product is damaged</p>
            </div>
        </div>
    </section>
    <!-- ***** Special Featured Area End ***** -->
@endsection
