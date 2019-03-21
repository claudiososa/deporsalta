@extends('layouts.app')
@section('content')
<div class='container'>
  <a class="btn btn-success" href="/waist/create">Crear nuevo Talle de Producto</a>
  <table class='table'>
    <tr>
      <td>Id</td>
      <td>Descripcion</td>
      <td>Orden</td>
      <td>Accion</td>
    </tr>
  @forelse ($waists as $waist)
    <tr>
      <td>{{$waist->id}}</td>
      <td>{{$waist->description}}</td>
      <td>{{$waist->order}}</td>
      <td><a class="btn btn-dark" href="/waist/update/{{$waist->id}}">Modificar</a></td>
    </tr>
    
  @empty
    <p>No hay colores creados</p>
  @endforelse
  </table>
  </div>  
@endsection
