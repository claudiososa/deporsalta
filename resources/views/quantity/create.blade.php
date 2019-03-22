@extends('layouts.app')
@section('content')
<div class='container'>
  <div class="col-md-12">
    <div class="col-md-12 alert alert-dark">
      <h4>Agregar Stock para producto Id:<b>{{$product->id}}</b>    Nombre: <b>{{$product->description}}</b></h4>
    </div>
    <div class="col-md-12">

    <form class="" action="/quantity/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
      {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <label for="description">Seleccione Talle</label>
        <select class="form-control" name="waist_id">
          @foreach ($waists as $k => $v)
            <option value="{{$v['id']}}">{{$v['description']}}</option>
          @endforeach
        </select>
        <label for="quantity">Cantidad</label>
        <input class='form-control' max="20" min="1" type="number" name="quantity" value="1">
        <hr>
        <button type="submit" class="btn btn-success" name="button">Agregar Stock</button>
      </div>
    </form>
  </div>
  </div>
</div>  
@endsection
