@extends('layouts.app')
@section('content')
<div class='container'>
  <div class='col-md-12'>
  <h4>Datos del producto </h4>
  <p>id:{{$product->id}}</p>
  <p>Categoría:{{$product->category->description}}</p>
  <p>Nombre:{{$product->description}}</p>    
  <p>Marca:{{$product->brand->description}}</p>
  <p>Color:{{$product->colour->description}}</p>

  <p><h5 class='alert alert-danger'>Stock</h5></p>
  @forelse ($product->quantity as $stock)
    <h5>Talle:{{$stock->waist->description}}<span class="badge badge-secondary">{{$stock->quantity}}</span></h5>    
  @empty
    <p>No existe stock para este producto</p>
  @endforelse

  <a class="btn btn-success" href="/product/create">Crear nuevo producto</a>
  </div>
</div>
@endsection
