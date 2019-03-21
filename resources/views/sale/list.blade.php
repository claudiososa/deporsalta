@extends('layouts.app')
@section('content')  
  
  <div class="container">        
    <hr>
    <form action='/sale/list' method='post'>
     {{csrf_field()}}   
    <div class='row alert alert-dark'>
      <div class='col-md-3'><h4>Ventas realizadas</h4></div>        
        <div class='col-md-4'><input type="date" name='firstDate' class='form-control' id='firstDate'></div>
        <div class='col-md-4'><input type="date" name='lastDate' class='form-control' id='lastDate'></div>
        <div class='col-md-1'> <input type="submit" value="Buscar" class="btn btn-dark"> </div>              
    </div>
    </form>
    @if(!empty($search))
    <div class='row alert alert-info'>      
      <div class='col-md-6'> Detalle de busqueda: Desde {{$search['firstDate']}} hasta {{$search['lastDate']}}</div>  
      <div class='col-md-6'>Total: {{$montoTotal['montoTotal']}}</div>
    </div>
    @endif
    

    <script src="{{asset('js/sale/action.js')}}"></script>
    <div>
      @foreach($salesDetail as $sale)
      <div class='row alert alert-dark'>
        <div class='col-md-4' >Comprobante: N° {{$sale->id}}</div>
        <div class='col-md-4'>Fecha: {{date('d-m-Y', strtotime($sale->date))}} Hora: {{date('H:m', strtotime($sale->date))}}</div>
        
        @foreach ($sale->total as $total)
        <div class='col-md-4'>Total: $ {{$total->totalSale}}</div>    
        @endforeach
        
      </div>        
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
            @forelse ($sale->saledetail as $detail)         

              <tr id='rowSale{{$detail->id}}'>
                <td>{{$detail->product->id}}</td>
                <td>{{$detail->product->description}}</td>
                <td>{{$detail->waist->description}}</td>
                <td>{{$detail->priceUnit}}</td>
                <td>{{$detail->quantity}}</td>      
                <td>{{$detail->total}}</td>                                  
              </tr>                            
            @empty
              <p>Sin detalles para este comprobante</p>
            @endforelse

          </tbody>
        </table>
      </div>   
      @endforeach
      
    </div>
    @if(empty($search))
      @if(count($salesDetail))
        <div class="mt-2 mx-auto">
          {{$salesDetail->links('pagination::bootstrap-4')}}
        </div>
      @endif
    @endif
  </div>
@endsection
