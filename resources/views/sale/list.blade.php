@extends('layouts.app')
@section('content')  
  <div class="container">        
    <hr>
    <h2>Ventas realizadas</h2>
    <script src="{{asset('js/sale/action.js')}}"></script>
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
            <td><a href="#" id="sale{{$sale->id}}" class="btn btn-danger">Cancelar venta</a></td>
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
  </div>
@endsection
