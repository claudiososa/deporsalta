@extends('layouts.app')
@section('content')
  <h1>Marca id:{{$brand->id}}</h1>
  <p>{{$brand->description}}</p>
  <p>{{$brand->marginReseller}}</p>
  <p>{{$brand->marginClient}}</p>
  <a class="btn btn-success" href="/brand/create">Crear nueva marca de producto</a>
@endsection
