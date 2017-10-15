@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/colour/create">Crear nuevo Color de Producto</a>
  @forelse ($colours as $colour)
    <p><label class="alert alert-success">id : {{$colour->id}} <b>{{$colour->description}}</b></label> <a class="btn btn-info" href="/colour/update/{{$colour->id}}">Modificar</a></p>
  @empty
    <p>No hay colores creados</p>
  @endforelse
  @if(count($colours))
    <div class="mt-2 mx-auto">
      {{$colours->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
