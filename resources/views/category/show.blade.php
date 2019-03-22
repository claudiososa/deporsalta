@extends('layouts.app')
@section('content')
<div class='container'>
  <div class='alert alert-dark'><h4>Categoria id:{{$category->id}}</h4></div>
  
  <p>Nombre de Categoría: {{$category->description}}</p>
  <a class="btn btn-dark" href="/category/create">Crear nueva categoria de producto</a>
  <br>
  <br>
</div>  
@endsection
