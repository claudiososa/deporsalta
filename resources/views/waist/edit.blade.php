@extends('layouts.app')
@section('content')

  <div class="row">
    <h1>Editando Color</h1>
    <form class="" action="/waist/edit" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="id" value="{{$waist->id}}" class="form-control">

        <label for="description">Nombre de Talle</label>
        <input type="text" name="description" value="{{$waist->description}}" class="form-control"
        placeholder="Ingrese nombre de talle">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
        <button type="submit" class="btn btn-success" name="button">Modificar Talle</button>
      </div>
    </form>
  </div>
@endsection
