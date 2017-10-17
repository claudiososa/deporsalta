@extends('layouts.app')
@section('content')

  <div class="col-md-12">
    <div class="col-md-12">
      <h3>Agregar Stock para:{{$product->description}}</h3>
    </div>
    <div class="col-md-12">

    <form class="" action="/quantity/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <label for="description">Agregar Imagen 1</label>
        <select class="form-control" name="waist_id">
          @forelse ($waists as $waist)
            <option value="{{$waist->id}}">{{$waist->description}}</option>
          @empty
            <option value="">No existe</option>
          @endforelse
        </select>
        <input max="20" min="1" type="number" name="quantity" value="1">
        <hr>
        <button type="submit" class="btn btn-success" name="button">Agregar Stock</button>
      </div>
    </form>
  </div>
  </div>
@endsection
