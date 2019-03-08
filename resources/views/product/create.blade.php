@extends('layouts.app')
@section('content')
<div class="container">
  <script src="{{asset('js/product/create.js')}}"></script>
  <div class="row">
    <h3>Crear Producto </h3>
    <br>
    <div class='col-md-12'>
    <p class='alert alert-info'><h1>Categoria: {{$category->description}}</h1></p>
    <form class="" action="/product/create" method="post">
      {{csrf_field()}}
    
      <div class="form-group @if($errors->has('description')) has-danger @endif">
        {{-- <label for="description">Nombre del Producto</label> --}}
        <input type="text" name="description" value="" class="form-control"
        placeholder="Ingrese nombre de producto">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('priceCost')) has-danger @endif">
        {{-- <label for="description">Precio Costo Principal</label> --}}
        <input type="text" name="cost" id="cost" value="" class="form-control" placeholder="Precio Costo General">
        <input type="text" name="client" id="client" value="" class="form-control" placeholder="Precio Venta General">
        @if ($errors->has('priceCost{{$waist->id}}'))
          @foreach ($errors->get('priceCost') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      @foreach ($waists as $waist)
      <p>Talle: {{$waist->description}}</p>

      <div class="form-group @if($errors->has('priceCost')) has-danger @endif">
        {{-- <label for="description">Precio Costo</label> --}}
        <input type="text" name="priceCost{{$waist->id}}" id="priceCost{{$waist->id}}" value="" class="form-control" placeholder="Precio de Costo">
        <input type="text" name="priceClient{{$waist->id}}" id="priceClient{{$waist->id}}" value="" class="form-control" placeholder="Precio Venta">
        @if ($errors->has('priceCost{{$waist->id}}'))
          @foreach ($errors->get('priceCost{{$waist->id}}') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
        
      @endforeach

      

      <div class="form-group @if($errors->has('priceReven')) has-danger @endif">
        {{-- <label for="description">Precio Revendedor</label> --}}
        <input type="text" name="priceReven" id="priceReven" value="" class="form-control" 
        placeholder="Precio para Revendedor">
        @if ($errors->has('priceReven'))
          @foreach ($errors->get('priceReven') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('priceClient')) has-danger @endif">
        {{-- <label for="description">Precio Cliente Final</label> --}}
        <input type="text" name="priceClient" id="priceClient" value="" class="form-control"
        placeholder="Precio para Cliente Final">
        @if ($errors->has('priceClient'))
          @foreach ($errors->get('priceClient') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
      
      <div class="form-group @if($errors->has('special')) has-danger @endif">
        <label for="special">Destacado</label> 
        <input type="checkbox" name="special" id="special" class="form-control">        
      </div>

      <div class="form-group @if($errors->has('marginReseller')) has-danger @endif">
        {{-- <label for="marginReseller">Margen Revendedor</label> --}}
        <input type="text" name="marginReseller" id="marginReseller" value="" class="form-control" readyonly>
        @if ($errors->has('marginReseller'))
          @foreach ($errors->get('marginReseller') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('marginClient')) has-danger @endif">
        {{-- <label for="marginClient">Margen Cliente Final</label> --}}
        <input type="text" name="marginClient" id="marginClient" value="" class="form-control" readyonly>
        @if ($errors->has('marginClient'))
          @foreach ($errors->get('marginClient') as $error)
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
            <option value="{{$brand->id}}">{{$brand->description}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group @if($errors->has('colour_id')) has-danger @endif">
        <label for="marginClient">Color</label>
        <select class="form-control" name="colour_id">
          @foreach ($colours as $colour)
            <option value="{{$colour->id}}">{{$colour->description}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-success" name="button">Crear Producto</button>
    </form>
  </div>
  </div>  
</div>    
@endsection
