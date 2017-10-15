@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/category/create">Crear nuevo categoria de producto</a>
  @forelse ($categories as $category)
    <p><label class="alert alert-success">id : {{$category->id}} <b>{{$category->description}}</b></label>
      <a class="btn btn-info" href="/category/update/{{$category->id}}">Modificar</a></p>
  @empty
    <p>No hay Categorias creadas</p>
  @endforelse
  @if(count($categories))
    <div class="mt-2 mx-auto">
      {{$categories->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
