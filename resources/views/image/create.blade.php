@extends('layouts.app')
@section('content')

  <div class="col-md-12">
    <div class="col-md-12 alert alert-info">
      <h3>Subir Imagen para:{{$product->description}}</h3>
    </div>
    <div class="row">
      @forelse ($images as $image)
        <div class="col-md-2">

          <img width="150" height="200" src="{{Storage::disk('public')->url($image->description)}}" alt="">
          <a href="/image/delete/{{$image->id}}">Quitar Imagen</a>
        </div>

      @empty
        <p>no existe imagen para este producto</p>
      @endforelse
    </div>
    <hr>
    <div class="col-md-12 alert alert-info">

    <form class="" action="/image/create" method="post" enctype="multipart/form-data">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <label for="description">Agregar nueva imagen</label>
        <input type="file" name="description" value="" class="form-control-file"
        placeholder="Seleccione imagen">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
        <hr>
        <button type="submit" class="btn btn-success" name="button">Subir Imagen</button>
      </div>
    </form>
  </div>
  </div>
@endsection
