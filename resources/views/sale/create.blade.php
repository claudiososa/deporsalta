@extends('layouts.app')
@section('content')
    
    @if(null !== $error)
        <p class="alert alert-warning">{{$error}}</p>
    @endif
    
  <script src="{{asset('js/sale/getPrice.js')}}"></script>
  <div class="container">
  <div class="col-md-12">
    <div class="col-md-12 alert alert-dark">
      <h3>Producto seleccionado :{{$product->description}}</h3>
    </div>
    <div class="col-md-12">

    <form class="" action="/sale/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <input type="hidden" name="sale_id" id="sale_id" value="{{$sale->id}}">
        <!-- <label for="description">Agregar Imagen 1</label> -->
        <div class='row'>
          <div class='col-md-5'>
            <table class='table'>
              <tr>
                <td>Seleccionar</td>
                <td>Talle</td>
                <td>Stock</td>
              </tr>
              @forelse ($waists as $waist)
              <tr>
                <td><input class='from-control' type="radio" name="type" value="{{$waist->id}}"></td>
                <td>{{$waist->description}}</td>
                <td></td>
                <td></td>
              </tr>
                @empty                
                @endforelse   
            </table>
          </div>
          <div class='col-md-4'>
            <label for="priceUnit">Precio Unitario</label><br>
            <input type="text" name="priceUnit" id="priceUnit" value="{{$product->priceClient}}" placeholder="precio unitario" >
            <hr>
            <label for="total">Total</label><br>
            <input type="text" name="total" id="total" value="" readonly >
            <hr>
            <button type="submit" class="btn btn-success" name="button">Agregar Item</button>
          </div>
          <div class='col-md-3'>Foto</div>
        </div>
        
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
        <label for="priceUnit">Precio Unitario</label><br>
        <input type="text" name="priceUnit" id="priceUnit" value="{{$product->priceClient}}" placeholder="precio unitario" >
        <hr>
        <hr>
        <label for="total">Total</label><br>
        <input type="text" name="total" id="total" value="" readonly >
        <hr>
        <button type="submit" class="btn btn-success" name="button">Agregar Item</button>
      </div>
    </form>
  </div>
  </div>
  </div>
@endsection
