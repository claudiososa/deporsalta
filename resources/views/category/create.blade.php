@extends('layouts.app')
@section('content')

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
        <button type="submit" class="btn btn-success" name="button">Crear Categoria</button>
      </div>
    </form>
  </div>
@endsection
