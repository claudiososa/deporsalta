@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/waist/create">Crear nuevo Talle de Producto</a>
  @forelse ($waists as $waist)
    <p><label class="alert alert-success">id : {{$waist->id}} <b>{{$waist->description}}</b></label> <a class="btn btn-info" href="/waist/update/{{$waist->id}}">Modificar</a></p>
  @empty
    <p>No hay colores creados</p>
  @endforelse
  @if(count($waists))
    <div class="mt-2 mx-auto">
      {{$waists->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
