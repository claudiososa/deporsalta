@extends('layouts.app')
@section('content')
    
    @if(null !== $error)
        <p class="alert alert-warning">{{$error}}</p>
    @endif
    
  <script src="{{asset('js/sale/getPrice.js')}}"></script>
  <div class="container">
  <div class="col-md-12">
    <div class="col-md-12">
      <h3>Venta de Producto :{{$product->description}}</h3>
    </div>
    <div class="col-md-12">

    <form class="" action="/sale/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <input type="hidden" name="sale_id" id="sale_id" value="{{$sale->id}}">
        <!-- <label for="description">Agregar Imagen 1</label> -->
        <select class="form-control" name="waist_id" id="waist_id">
            <option value="0">Seleccione</option>
          @forelse ($waists as $waist)
            <option value="{{$waist->id}}">{{$waist->description}}</option>
          @empty
            <option value="">No existe</option>
          @endforelse
        </select>
        <input max="20" min="1" type="number" name="quantity" id="quantity" value="1">
        <hr>
        <input type="text" name="priceUnit" id="priceUnit" value="{{$product->priceClient}}" placeholder="precio unitario" >
        <hr>
        <hr>
        <input type="text" name="total" id="total" value="" readonly >
        <hr>
        <button type="submit" class="btn btn-success" name="button">Confirmar Venta</button>
      </div>
    </form>
  </div>
  </div>
  </div>
@endsection
