@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/category/create">Crear nuevo categoria de producto</a>
  @forelse ($categories as $category)
    <p>{{$category->id}}--{{$category->description}}
      -Creado por {{$category->user->name}}
      -Fecha:{{$category->created_at}}</p>
  @empty
    <p>No hay Categorias creadas</p>
  @endforelse
  @if(count($categories))
    <div class="mt-2 mx-auto">
      {{$categories->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
