@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/brand/create">Crear nuevo marca de producto</a>
  @forelse ($brands as $brand)
    <p><label class="alert alert-success">id : {{$brand->id}} <b>{{$brand->description}}</b></label> <a class="btn btn-info" href="/brand/update/{{$brand->id}}">Modificar</a></p>
  @empty
    <p>No hay Marca creadas</p>
  @endforelse
  @if(count($brands))
    <div class="mt-2 mx-auto">
      {{$brands->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
