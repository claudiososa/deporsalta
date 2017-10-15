@extends('layouts.app')
@section('content')
  <h1>Color id:{{$colour->id}}</h1>
  <p>{{$colour->description}}</p>
  <a class="btn btn-success" href="/colour/create">Crear nuevo color de producto</a>
@endsection
