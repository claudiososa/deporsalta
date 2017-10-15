@extends('layouts.app')
@section('content')
  <h1>Categoria id:{{$category->id}}</h1>
  <p>{{$category->description}}</p>
  <a class="btn btn-success" href="/category/create">Crear nueva categoria de producto</a>
@endsection
