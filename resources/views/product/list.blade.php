@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/product/create">Crear nuevo Producto</a>
  <hr>
  <h2>Lista de Productos</h2>
  @forelse ($products as $product)
    <p><label class="alert alert-success">id : {{$product->id}} <b>{{$product->description}}</b></label></p>
    <p>Categoria:{{$product->category->description}}</p>
    <p>Marca:{{$product->brand->description}}</p>
    <p>Color:{{$product->colour->description}}</p>
    
    <p>  <a class="btn btn-info" href="/product/update/{{$product->id}}">Modificar</a></p>
  @empty
    <p>No hay Productos creadas</p>
  @endforelse
  @if(count($products))
    <div class="mt-2 mx-auto">
      {{$products->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
