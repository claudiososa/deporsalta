@extends('layouts.app')
@section('content')
<script src="{{asset('js/product/create.js')}}"></script>
<div class="container">    
    <div class='col-md-12'>
    <h4>Crear Producto </h4>    
    <h5 class="alert alert-info">Categoria: {{$category->description}}</h5>
    <form class="" action="/product/create" method="post">
      {{csrf_field()}}
      <input type="hidden" name="type" value="{{$category->type}}">
      <input type="hidden" name="category_id" value="{{$category->id}}">

      <div class="form-group @if($errors->has('description')) has-danger @endif">
        <label for="description">Nombre del Producto</label>
        <input type="text" name="description" value="" class="form-control"
        >
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

      
      <div class="form-group @if($errors->has('special')) has-danger @endif">
        <label for="special">Destacado</label> 
        <input type="checkbox" name="special" id="special" class="form-control">        
      </div>

      <!-- <div class="form-group @if($errors->has('marginReseller')) has-danger @endif">
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
      </div> -->

     

     
      <button type="submit" class="btn btn-success" id="createButton" name="button">Crear Producto</button>
    </form>
  </div>
  
</div>    
@endsection
