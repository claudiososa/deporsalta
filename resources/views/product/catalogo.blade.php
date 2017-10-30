@extends('layouts.app')
@section('content')
  <h2>Catalogo Deportiva Salta</h2>
  <hr>
  <div class="row">
    <div class="col-md-3">
      <p><a href="/catalogo">Ver todo</a></p>
      <p class="alert alert-success">Categorias</p>
      @forelse ($categories as $category)
        <p><a href="/catalogo/{{$category->id}}">{{$category->description}}</a></p>
      @empty
        <p>No existen categorias</p>
      @endforelse
    </div>
    <div class="col-md-9">
      <div class="row">
    @forelse ($products as $product)
      <div class="col-md-4">
        <p>{{$product->description}}</p>
        @forelse ($product->image as $image)
          <p><img width="160" height="250" src="{{Storage::disk('public')->url($image->description)}}" alt=""></p>
        @empty
          <p><img width="160" height="250" src="{{Storage::disk('public')->url('products/sinFoto.png')}}" alt=""></p>
        @endforelse

          @forelse ($product->quantity as $stock)
            <p class="alert alert-info">(Art.{{$product->id}})&nbsp;&nbsp;   En stock</p>
            @break
          @empty
            <p class="alert alert-danger">(Art.{{$product->id}})&nbsp;&nbsp;   Sin stock</p>
          @endforelse

    </div>
    @empty
      <p>No hay Productos creadas</p>
    @endforelse
    </div>

    </div>
    @if(count($products))
      <div class="mt-2 mx-auto">
          {{$products->links('pagination::bootstrap-4')}}
      </div>
    @endif
  </div>


@endsection
