@extends('layouts.app')
@section('content')  
  <script src="{{asset('js/sale/action.js')}}"></script>
  <h2>Ventas</h2>
  <table class="table">
    <thead>
      <th>Id</th>
      <th>Producto</th>
      <th>Talle</th>
      <th>P. Unitario</th>
      <th>Cantidad</th>
      <th>Total</th>      
      <th>Cancelar</th>      
    </thead>
    <tbody>
  @forelse ($sales as $sale)
    <tr id='rowSale{{$sale->id}}'>
      <td>{{$sale->id}}</td>
      <td>{{$sale->product->description}}</td>
      <td>{{$sale->waist->description}}</td>
      <td>{{$sale->priceUnit}}</td>
      <td>{{$sale->quantity}}</td>      
      <td>{{$sale->total}}</td>      
      {{-- <td><a href="/sale/delete/{{$sale->id}}" id="sale{{$sale->id}}" class="btn btn-danger">Cancelar venta</a></td></td> --}}
      <td><a href="#" id="sale{{$sale->id}}" class="btn btn-danger">Cancelar venta</a></td></td>
      {{-- <td><a class="btn btn-info" href="/product/update/{{$product->id}}">Modificar</a></td>
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
      <td>
        <!-- @forelse ($product->quantity as $stock)
          <b>{{$stock->waist->description}}</b>-{{$stock->quantity}}
        @empty
          Sin stock
        @endforelse -->
        
        @forelse ($product->quantitySum as $total)
          <a href="/sale/new/{{$product->id}}" class="btn btn-success">Vender</a></td>
        @empty
          <p class="btn btn-warning">Sin Stock</p>
        @endforelse
      </td> --}}
    </tr>
  @empty
    <p>No hay Productos creadas</p>
  @endforelse
  </tbody>
  </table>

  @if(count($sales))
    <div class="mt-2 mx-auto">
        {{$sales->links('pagination::bootstrap-4')}}
    </div>
  @endif
@endsection
