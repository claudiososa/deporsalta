@extends('layouts.app')
@section('content')

  <div class="row">
    <h1>Editando Marca</h1>
    <form class="" action="/brand/edit" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$brand->id}}" class="form-control">

      <div class="form-group @if($errors->has('description')) has-danger @endif">
        <label for="description">Nombre de Marca</label>
        <input type="text" name="description" value="{{$brand->description}}" class="form-control">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <div class="form-group @if($errors->has('marginReseller')) has-danger @endif">
        <label for="description">Margen Revendedor</label>
        <input type="number" min="20" max="999" name="marginReseller" value="{{$brand->marginReseller}}" class="form-control">
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
        <input type="number" min="20" max="999" name="marginClient" value="{{$brand->marginClient}}" class="form-control">
        @if ($errors->has('marginClient'))
          @foreach ($errors->get('marginClient') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>

      <button type="submit" class="btn btn-success" name="button">Modificar Marca</button>

    </form>
  </div>
@endsection
