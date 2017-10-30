@extends('layouts.app')
@section('content')
  <form class="" action="/product/search" method="post">
    {{csrf_field()}}

    <div class="form-group">
      <label for="categories">Descripcion</label>
      <input class="form-control" type="text" name="description" value="">
    </div>

    <div class="form-group">
      <label for="categories">Categorias</label>
      <select class="form-control" name="categories">
          <option value="0">Seleccionar</option>
        @forelse ($categories as $category)
          <option value="{{$category->id}}">{{$category->description}}</option>
        @empty
          <option value="">No existen Categorias</option>
        @endforelse
      </select>
    </div>
    <div class="form-group">
      <label for="brands">Marcas</label>
      <select class="form-control" name="brands">
        <option value="0">Seleccionar</option>
        @forelse ($brands as $brand)
          <option value="{{$brand->id}}">{{$brand->description}}</option>
        @empty
          <option value="">No existen Marcas</option>
        @endforelse
      </select>
    </div>
    <div class="form-group">
      <label for="colours">Colores</label>
      <select class="form-control" name="colours">
        <option value="0">Seleccionar</option>
        @forelse ($colours as $colour)
          <option value="{{$colour->id}}">{{$colour->description}}</option>
        @empty
          <option value="">No existen Colores</option>
        @endforelse
      </select>
    </div>
    <div class="form-group">
      <label for="waists">Talles</label>
      <select class="form-control" name="waists">
        <option value="0">Seleccionar</option>
        @forelse ($waists as $waist)
          <option value="{{$waist->id}}">{{$waist->description}}</option>
        @empty
          <option value="">No existen Talles</option>
        @endforelse
      </select>
    </div>
    <button type="submit" name="button">Buscar</button>
  </form>
@endsection
