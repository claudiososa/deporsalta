@extends('layouts.app')
@section('content')
  <h1>Producto id:{{$product->id}}</h1>
  <p>{{$product->description}}</p>
  <p>{{$product->priceCost}}</p>
  <p>{{$product->marginReseller}}</p>
  <p>{{$product->marginClient}}</p>
  <p>{{$product->category->description}}</p>
  <p>{{$product->brand->description}}</p>
  <p>{{$product->colour->description}}</p>

  @forelse ($product->quantity as $stock)
    <p>Talle:{{$stock->waist->description}} Cantidad:{{$stock->quantity}}</p>
  @empty
    <p>No existe stock para este producto</p>
  @endforelse

  <a class="btn btn-success" href="/product/create">Crear nuevo producto</a>

@endsection
