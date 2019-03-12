@extends('layouts.app')
@section('content')

  <!-- ***** Quick View Modal Area Start ***** -->
  <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                            <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
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
    <section class="shop_grid_area ">
        <div class="container">
            <div class="row">
                <h3 class="page-title">Catalogo</h3>
            </div>    
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="shop_sidebar_area">
                        <div class="widget catagory mb-30">
                            <h6 class="widget-title">Categorias de Productos</h6>
                            <div class="widget-desc">
                                @forelse ($categories as $category)
                                    <div class="d-flex align-items-center mb-2">
                                  {{-- <div class="custom-control custom-checkbox d-flex align-items-center mb-2"> --}}
                                      {{-- <input type="checkbox" class="custom-control-input" id="customCheck1"> --}}
                                      <label class="custom-control-label" for="customCheck1"><a href="/catalogo/{{$category->id}}">{{$category->description}}</a> <span class="text-muted">(
                                        @forelse ($category->productsCount as $item)                                            
                                            {{$item->total}}    
                                        @empty
                                            0
                                        @endforelse  

                                        )</span></label>
                                  </div>                              
                                @empty
                                  <p>No existen categorias</p>
                                @endforelse
                               
                            </div>
                         </div>  
                        

                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <div class="shop_grid_product_area">                      
                        <div class="row">
                            @forelse ($products as $product)
                              {{-- @if($product->quantitySum[0]->total != 0) --}}
                                <div class="col-12 col-sm-6 col-lg-4">
                                  <div class="single_product_area mb-30">
                                     <div class="single_arrivals_slide">
                                        <div class="product_image">
                                           @php ($cant = 0)
                                           @forelse ($product->picture as $image)
                                              @if($cant == 0)
                                                <img class="normal_img" src="{{Storage::disk('public')->url($image->description)}}" alt="">
                                                @php ($cant++)
                                              @else
                                                <img class="hover_img" src="{{Storage::disk('public')->url($image->description)}}" alt="">
                                              @endif                                                                                                       
                                              @empty
                                                <p><img width="160" height="250" src="{{Storage::disk('public')->url('products/sinFoto.png')}}" alt=""></p>
                                            @endforelse
                                            @if($product->quantitySum->isNotEmpty())
                                                @if($product->quantitySum[0]->total != 0)
                                                    <div class="product_badge">
                                                        <span class="badge-new">En Stock</span>
                                                    </div>
                                                @else    
                                                    <div class="product_badge2">
                                                        <span class="badge-new" >Sin Stock</span>
                                                    </div>                                           
                                                @endif
                                            @else    
                                                <div class="product_badge2">
                                                    <span class="badge-new" >Sin Stock</span>
                                                </div>                                           
                                            @endif            
                                              <!-- Quick View -->
                                              <div class="product_quick_view">
                                                <a href="#" data-target="#quickview"><i class="ti-eye" aria-hidden="true"></i> Mas Detalles</a>
                                                {{-- <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-eye" aria-hidden="true"></i> Mas Detalles</a> --}}
                                              </div>
                                        </div>
                                        <!-- Product Description -->
                                        <div class="product_description">
                                          <p class="brand_name"><b>Marca:</b> {{$product->brand->description}}</p>
                                            <p><b>Talle:</b>
                                                @forelse ($product->quantity as $stock)
                                                    @if ($stock->quantity > 0)
                                                        {{$stock->waist->description}}-
                                                    @endif
                                                    
                                                @empty
                                                    Sin stock
                                                @endforelse
                                            </p>
                                           <h5><a href="#">{{$product->description}}</a></h5>
                                           @foreach ($product->productpriceUnico as $price)
                                                <h6>Precio de contado: $ {{number_format($price->price_sale, 0,'','.')}} <span>{{$price->price_sale+200}}</span></h6>
                                           @endforeach
                                        </div>
                                       </div>
                                   </div>
                                </div>
                              {{-- @endif --}}
                            @empty
                              <p>No hay Productos creadas</p>
                            @endforelse
                        </div>
                        @if(count($products)>0)
                          <div class="mt-2 mx-auto shop_pagination_area">
                            {{$products->links('pagination::bootstrap-4')}}
                          </div>
                        @endif                 

                </div>
            </div>
        </div>
    </section>

@endsection
