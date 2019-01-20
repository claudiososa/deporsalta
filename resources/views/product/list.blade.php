@extends('layouts.app')
@section('content')
<div class="container">
  <a class="btn btn-success" href="/product/create">Crear nuevo Producto</a>
  <hr>
  <h2>Lista de Productos</h2>
  <div>
      <p>Filtrar</p>
    	<form action="{{route('searchProduct')}}" class="form-inline my-2 my-lg-0" method="post">
          {{csrf_field()}}          
            <input name="id" class="form-control mr-sm-2" type="text" placeholder="id">
            <input name="description" class="form-control mr-sm-2" type="text" placeholder="descripción">
            <select class="form-control" name="category_id">
                <option value="0">Categoría</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->description}}</option>
                @endforeach
              </select>
              <select class="form-control" name="brand_id">
                  <option value="0">Marca</option>
                  @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->description}}</option>
                  @endforeach
                </select>              
            <button class="btn btn-warning" type="submit" >Buscar</button>
          </form>
  </div>
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
        @forelse ($product->picture as $image)
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
      <td>
        <!-- @forelse ($product->quantity as $stock)
          <b>{{$stock->waist->description}}</b>-{{$stock->quantity}}
        @empty
          Sin stock
        @endforelse -->
        
        @forelse ($product->quantitySum as $total)  
          @if($total->total>0)
            <a href="/sale/new/{{$product->id}}" class="btn btn-success">Vender</a></td>
          @else
            <p class="btn btn-warning">Sin Stock</p>
          @endif
        @empty
          <p class="btn btn-warning">Sin Stock</p>
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
  </div>
@endsection
