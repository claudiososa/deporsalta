@extends('layouts.app')
@section('content')
<div class='container'>
  <div class='row alert alert-dark'>
    <div class='col-md-6'><h4>Lista de Categorías</h4></div>
    <div class='col-md-6'><a class="btn btn-dark" href="/category/create">Crear nueva categoría</a></div>
  </div>
  
  <div class='row'>
    <table class='table table-hover'>
      <tr>
        <td><b>Id</b></td>
        <td><b>Descripción</b></td>
        <td><b>Acción</b></td>
      </tr> 
      @forelse ($categories as $category)
        <tr>
          <td><b>{{$category->id}}</b></td>
          <td>{{$category->description}}</td>
          <td><a class="btn btn-dark" href="/category/update/{{$category->id}}">Modificar</a></td>
        </tr>      
      @empty
        <p>No hay Categorias creadas</p>
      @endforelse
    </table>
  </div>
  @if(count($categories))
    <div class="mt-2 mx-auto">
      {{$categories->links('pagination::bootstrap-4')}}
    </div>
  @endif
</div>
@endsection
