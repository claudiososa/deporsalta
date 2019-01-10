@extends('layouts.app')
@section('content')
  <script src="{{asset('js/product/create.js')}}"></script>
  <div class="row">
    <h2>Nuevo Producto</h2>
    <form class="" action="/product/create" method="post">
      {{csrf_field()}}
      <div class="form-group @if($errors->has('description')) has-danger @endif">
        <label for="description">Nombre del Producto</label>
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
        <label for="description">Precio Costo</label>
        <input type="text" name="priceCost" id="priceCost" value="" class="form-control" placeholder="Precio de Costo">
        @if ($errors->has('priceCost'))
          @foreach ($errors->get('priceCost') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('priceReven')) has-danger @endif">
        <label for="description">Precio Revendedor</label>
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
        <label for="description">Precio Cliente Final</label>
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
        <label for="marginReseller">Margen Revendedor</label>
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
        <label for="marginClient">Margen Cliente Final</label>
        <input type="text" name="marginClient" id="marginClient" value="" class="form-control" readyonly>
        @if ($errors->has('marginClient'))
          @foreach ($errors->get('marginClient') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('category_id')) has-danger @endif">
        <label for="marginClient">Categoria</label>
        <select class="form-control" name="category_id">
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->description}}</option>
          @endforeach
        </select>
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
@endsection
