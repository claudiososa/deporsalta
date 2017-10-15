@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/colour/create">Crear nuevo Color de Producto</a>
  @forelse ($colours as $colour)
    <p>{{$colour->id}}--{{$colour->description}}
      -Creado por {{$colour->user->name}}
      -Fecha:{{$colour->created_at}}</p>
  @empty
    <p>No hay Categorias creadas</p>
  @endforelse
  @if(count($colours))
    <div class="mt-2 mx-auto">
      {{$colours->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
