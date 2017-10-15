@extends('layouts.app')
@section('content')

  <div class="row">
    <h1>Editando Categoria</h1>
    <form class="" action="/category/edit" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="id" value="{{$category->id}}" class="form-control">

        <label for="description">Nombre de Categoria</label>
        <input type="text" name="description" value="{{$category->description}}" class="form-control"
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
