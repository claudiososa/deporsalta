@extends('layouts.app')
@section('content')
  <div class='container'>
  <div class="row">
    <form class="" action="/brand/create" method="post">
      {{csrf_field()}}
      <div class="form-group @if($errors->has('description')) has-danger @endif">
        <label for="description">Nombre de Marca</label>
        <input type="text" name="description" value="" class="form-control"
        placeholder="Ingrese nombre de marca">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
      
        <button type="submit" class="btn btn-success" name="button">Crear Marca</button>

    </form>
  </div>
  </div>
@endsection
