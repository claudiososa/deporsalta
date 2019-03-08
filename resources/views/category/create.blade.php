@extends('layouts.app')
@section('content')
<div class='container'>
  <div class="row">
    <form class="" action="/category/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <label for="description">Nombre de Categoria</label>        
        <input type="text" name="description" value="" class="form-control"
        placeholder="Ingrese nombre de categoria">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
        <br>
        <p >Seleccione tipo de Talle para la categoria</p>
        <br>
        @foreach ($waists as $waist)
          <p class='alert alert-info'>
            <input class='from-control' type="radio" name="type" value="{{$waist->type}}"> Tipo Talle: {{$waist->type}}
          </p>
          <ul>
          @foreach ($waist_details as $detail)
            @if ($detail->type == $waist->type)
              
                <li>{{$detail->description}}</li>
              
            @endif
            
          @endforeach
          </ul>              
        @endforeach

        <button type="submit" class="btn btn-success" name="button">Crear Categoria</button>
      </div>
    </form>
  </div>
  </div>  
@endsection
