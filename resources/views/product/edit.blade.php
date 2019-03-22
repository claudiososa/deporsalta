@extends('layouts.app')
@section('content')
  <script src="{{asset('js/product/create.js')}}"></script>
  <div class="container">
  
    <h4>Modificar Producto</h4>
    <h5 class='alert alert-info'>Categoria: {{$category->description}}</h5>
    <form class="" action="/product/edit" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$product->id}}" class="form-control">
      <input type="hidden" name="type" value="{{$category->type}}">
      <input type="hidden" name="category_id" value="{{$category->id}}">

      <div class="form-group @if($errors->has('description')) has-danger @endif">
        <label for="description">Nombre del Producto</label>
        <input type="text" name="description" value="{{$product->description}}" class="form-control"
        placeholder="Ingrese nombre de producto">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('brand_id')) has-danger @endif">
        <label for="marginClient">Marca</label>
        <select class="form-control" name="brand_id">
          @foreach ($brands as $brand)
            @if ($brand->id==$product->brand_id)
              <option selected value="{{$brand->id}}">{{$brand->description}}</option>
            @else
              <option value="{{$brand->id}}">{{$brand->description}}</option>
            @endif

          @endforeach
        </select>
      </div>

      <div class="form-group @if($errors->has('colour_id')) has-danger @endif">
        <label for="marginClient">Color</label>
        <select class="form-control" name="colour_id">
          @foreach ($colours as $colour)
            @if ($colour->id==$product->colour_id)
              <option selected value="{{$colour->id}}">{{$colour->description}}</option>
            @else
              <option value="{{$colour->id}}">{{$colour->description}}</option>
            @endif

          @endforeach
        </select>
      </div>

      <div class="form-group @if($errors->has('priceCost')) has-danger @endif">
        {{-- <label for="description">Precio Costo Principal</label> --}}
        <input type="text" name="cost" id="cost" value="" class="form-control" placeholder="Precio Costo">
        <input type="text" name="client" id="client" value="" class="form-control" placeholder="Precio Venta">
        @if ($errors->has('priceCost{{$waist->id}}'))
          @foreach ($errors->get('priceCost') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      @foreach ($waists as $key => $value)
      <p class='alert alert-info'>Talle: {{$value['description']}}</p>

      <div class="form-group @if($errors->has('priceCost')) has-danger @endif">
        @foreach($productPrice as $price)
          @if($value['id'] == $price->waist_id)
            <input type="text" name="priceCost{{$value['id']}}" id="priceCost{{$value['id']}}" value="{{$price->price_cost}}" class="form-control" placeholder="Precio de Costo">
            <input type="text" name="priceClient{{$value['id']}}" id="priceClient{{$value['id']}}" value="{{$price->price_sale}}" class="form-control" placeholder="Precio Venta">
          
          @endif        
        @endforeach
        
        @if ($errors->has('priceCost{{$value["id"]}}'))
          @foreach ($errors->get('priceCost{{$value["id"]}}') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
        
      @endforeach   

      <div class="form-group @if($errors->has('special')) has-danger @endif">
        <label for="special">Destacado</label>      
        <div class='form-group'>
        @if($product->special == '1')
          <input type="checkbox" name="special" id="special"  checked class="form-control">
        @else
          <input type="checkbox" name="special" id="special"  class="form-control">
        @endif
        </div>
      </div>   

      <button type="submit" class="btn btn-success" name="button">Modificar Producto</button>
    </form>
  </div>
@endsection
