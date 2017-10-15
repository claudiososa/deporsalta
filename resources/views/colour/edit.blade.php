@extends('layouts.app')
@section('content')

  <div class="row">
    <h1>Editando Color</h1>
    <form class="" action="/colour/edit" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="id" value="{{$colour->id}}" class="form-control">

        <label for="description">Nombre de Color</label>
        <input type="text" name="description" value="{{$colour->description}}" class="form-control"
        placeholder="Ingrese nombre de color">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
        <button type="submit" class="btn btn-success" name="button">Modificar Color</button>
      </div>
    </form>
  </div>
@endsection
