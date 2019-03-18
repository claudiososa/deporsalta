@extends('layouts.app')
@section('content')
@if(isset($sale->id))
<script>
  let sale_id ={{$sale->id}}
  //alert (sale_id)
</script>
@else
<script>
  let sale_id ='0'
  //alert (sale_id)
</script>
@endif

<div class="container">
  <script src="{{asset('js/sale/getPrice.js')}}"></script>
  <div class='alert alert-success'>
    <h4>Buscar Producto</h4>      
    	<form action="{{route('searchProductSale')}}" class="form-inline my-2 my-lg-0" method="post">
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
    @if (isset($products))
    <div class='alert alert-success'>
      <h4>Resultado de busqueda</h4>
      <table class="table">
        <thead>
          <th>Id</th>
          <th>Descripcion</th>
          <th>Categoria</th>
          <th>Marca</th>
          <th>Color</th>      
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
          <td>
            @forelse ($product->quantity as $stock)
              <b>{{$stock->waist->description}}</b>-{{$stock->quantity}}
            @empty
              Sin stock
            @endforelse
          
          <td>
            @forelse ($product->picture as $image)
              <img width="45" height="45" src="{{Storage::disk('public')->url($image->description)}}" alt="">
            @empty

            @endforelse
          
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
 @endif


 @if ($saleDetail != '')
 <div class='alert alert-dark' id="saleDetail">
      <h4>Detalle de Venta actual</h4>
    <table class='table'>
      <thead>
        <tr>
          <th>Art.</th>
          <th>Producto</th>
          <th>Talle</th>
          <th>Cantidad</th>
          <th>Subotal</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($saleDetail as $detail)
        <tr id='rowDetail{{$detail->id}}'>
          <td>{{$detail->product->id}}</td>
          <td>{{$detail->product->description}}</td>
          <td>{{$detail->waist->description}}</td>
          <td>{{$detail->quantity}}</td>
          <td>${{$detail->total}}</td>
          <td><a href="#" id="saledetail{{$detail->id}}" class="btn btn-danger">Quitar</a></td>
        </tr>
        @endforeach
        <tr id='rowTotal'>
          <td></td>
          <td></td>
          <td></td>
          <td>Total:</td>
          <td class='alert alert-danger'>$<input type="text" id='totalSale' value='{{$totalSale}}' disabled></td>
        </tr>
        <tr>
          <td colspan='6'>Detalle de pago</td>
        </tr>
        <tr id='rowTypePayment'>
          <td>
            <select name="tipoEfectivo" id="tipoEfectivo" class="form-control" disabled>
              <option value="efectivo" selected>Efectivo</option>
            </select>            
          </td>  
          <td>
            <input type="text" id='montoEfectivo' class="form-control" value="0">
          </td>          
          <td colspan='2'>
            <select name="tipoTarjeta" id="tipoTarjeta" class="form-control">
              <option value="0" selected>Tipo de Tarjeta</option>
              <option value="debito" >Debito</option>
              <option value="credito">Credito</option>
            </select>            
          </td>  
          <td>
            <input type="text" id='montoTarjeta' class="form-control" value="0">
          </td>          
        </tr>

        <tr id="trCuotas" style='display:none'>
          <td colspan='2'></td>            
          <td colspan='2'>
            <select name="quotas" id="quotas" class="form-control">
             
              @foreach ($quotas as $quota)
                <option value="{{$quota->percent}}">{{$quota->number}}</option>
              @endforeach              
            </select>            
          </td>  
          <td>
            <input type="text" id='montoTarjetaCuotas' class="form-control" disabled>
          </td>                    
        </tr>
        <tr id='trAmountQuota' style='display:none'>
          <td colspan='3'></td>
          <td>Valor Cuota</td>
          <td>
            <input type="text" id='amountQuota' class="form-control" disabled>
          </td>
        </tr>
        <tr id='rowConfirmSale'><td colspan="6"><button class='btn btn-info' id='confirmSale'>Confirmar venta</button></td></tr>
      </tbody>
    </table>
</div>
 @endif
  </div><!-- End container -->
@endsection
