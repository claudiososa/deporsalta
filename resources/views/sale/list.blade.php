@extends('layouts.app')
@section('content')  
  <div class="container">        
    <hr>
    <h2>Ventas realizadas</h2>
    <script src="{{asset('js/sale/action.js')}}"></script>
    <div>
      @foreach($sales as $sale)
      <div> {{$sale->id}} {{$sale->date}}</div>        
      <div>   
        <table class="table">
          <thead>
            <th>Id</th>
            <th>Producto</th>
            <th>Talle</th>
            <th>P. Unitario</th>
            <th>Cantidad</th>
            <th>Total</th>      
            <!-- <th>Cancelar</th>       -->
          </thead>
          <tbody>
            <?$tot=0?>
            @forelse ($salesDetail as $detail)
              @if($detail->sale_id == $sale->id)
               <?$tot = $tot + $detail->total;?>
               
              
              <tr id='rowSale{{$detail->id}}'>
                <td>{{$detail->sale->id}}</td>
                <td>{{$detail->product->description}}</td>
                <td>{{$detail->waist->description}}</td>
                <td>{{$detail->priceUnit}}</td>
                <td>{{$detail->quantity}}</td>      
                <td>{{$detail->total}}</td>      
                {{-- <td><a href="/sale/delete/{{$detail->id}}" id="sale{{$detail->id}}" class="btn btn-danger">Cancelar venta</a></td></td> --}}
                <!-- <td><a href="#" id="sale{{$detail->id}}" class="btn btn-danger">Cancelar venta</a></td> -->
              </tr>
              <tr>
                <td colspan="6">{{$tot}}</td>
              </tr>
              @endif
            @empty
              <p>No hay Productos creadas</p>
            @endforelse

          </tbody>
        </table>
      </div>   
      @endforeach
      
    </div>
    <table class="table">
      <thead>
        <th>Id</th>
        <th>Producto</th>
        <th>Talle</th>
        <th>P. Unitario</th>
        <th>Cantidad</th>
        <th>Total</th>      
        <!-- <th>Cancelar</th>       -->
      </thead>
      <tbody>
        @forelse ($salesDetail as $detail)
          <tr id='rowSale{{$detail->id}}'>
            <td>{{$detail->sale->id}}</td>
            <td>{{$detail->product->description}}</td>
            <td>{{$detail->waist->description}}</td>
            <td>{{$detail->priceUnit}}</td>
            <td>{{$detail->quantity}}</td>      
            <td>{{$detail->total}}</td>      
            {{-- <td><a href="/sale/delete/{{$detail->id}}" id="sale{{$detail->id}}" class="btn btn-danger">Cancelar venta</a></td></td> --}}
            <!-- <td><a href="#" id="sale{{$detail->id}}" class="btn btn-danger">Cancelar venta</a></td> -->
          </tr>
        @empty
          <p>No hay Productos creadas</p>
        @endforelse
      </tbody>
    </table>
    @if(count($salesDetail))
      <div class="mt-2 mx-auto">
          {{$salesDetail->links('pagination::bootstrap-4')}}
      </div>
    @endif
  </div>
@endsection
