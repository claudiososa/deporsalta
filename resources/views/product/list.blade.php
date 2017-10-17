@extends('layouts.app')
@section('content')
  <a class="btn btn-success" href="/product/create">Crear nuevo Producto</a>
  <hr>
  <h2>Lista de Productos</h2>
  <table class="table">
    <thead>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Categoria</th>
      <th>Marca</th>
      <th>Color</th>
      <th>Accion</th>
      <th>Talles</th>
      <th>Imagen</th>
      <th>Total</th>
    </thead>
    <tbody>
  @forelse ($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->category->description}}</td>
      <td>{{$product->brand->description}}</td>
      <td>{{$product->colour->description}}</td>
      <td><a class="btn btn-info" href="/product/update/{{$product->id}}">Modificar</a></td>
      <td>
        @forelse ($product->quantity as $stock)
          <b>{{$stock->waist->description}}</b>-{{$stock->quantity}}
        @empty
          Sin stock
        @endforelse
        <a href="/quantity/new/{{$product->id}}" class="btn btn-success">Agregar Stock</a></td>
      </td>
      <td>
        @forelse ($product->image as $image)
          <img width="45" height="45" src="{{Storage::disk('public')->url($image->description)}}" alt="">
        @empty

        @endforelse
        <a href="/image/new/{{$product->id}}" class="btn btn-success">Agregar Imagen</a></td>
      <td>
        @forelse ($product->quantitySum as $total)
          <b>{{$total->total}}</b>
        @empty
          0
        @endforelse
      </td>
    </tr>
  @empty
    <p>No hay Productos creadas</p>
  @endforelse
  </tbody>
  </table>

  @if(count($products))
    <div class="mt-2 mx-auto">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
