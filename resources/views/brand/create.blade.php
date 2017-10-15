@extends('layouts.app')
@section('content')

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

      <div class="form-group @if($errors->has('marginReseller')) has-danger @endif">
        <label for="marginReseller">Margen Revendedor</label>
        <input type="number" min="20" max="999" name="marginReseller" value="" class="form-control">
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
        <input type="number" min="20" max="999" name="marginClient" value="" class="form-control">
        @if ($errors->has('marginClient'))
          @foreach ($errors->get('marginClient') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
        <button type="submit" class="btn btn-success" name="button">Crear Marca</button>

    </form>
  </div>
@endsection
