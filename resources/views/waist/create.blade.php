@extends('layouts.app')
@section('content')

  <div class="container">
    <form class="" action="/waist/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <label for="description">Nombre de Talle</label>
        <input type="text" name="description" value="" class="form-control"
        placeholder="Ingrese nombre de talle">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif

        <div class='row'>
      @foreach ($waists as $waist)
        <div class='col-md-4'>
          <p class='alert alert-dark'>
            <input type="radio"  name="type" value="{{$waist->type}}">Tipo Talle: {{$waist->type}}<br>
            <!-- <input class='from-control' type="radio" name="type" value="{{$waist->type}}"> Tipo Talle: {{$waist->type}} -->
          </p>
          <ul>
          @foreach ($waist_details as $detail)
            @if ($detail->type == $waist->type)
              
                <li>{{$detail->description}}</li>
              
            @endif
            
          @endforeach
          </ul>           
        </div>   
      @endforeach
    </div>
        <button type="submit" class="btn btn-success" name="button">Crear Talle</button>
      </div>
    </form>
  </div>
@endsection
