@extends('layouts.app')
@section('content')

  <div class="container">
    <div class='alert alert-dark'>
      <h4>Editando Categoria</h4>
    </div>
    
    <form class="" action="/category/edit" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$category->id}}" class="form-control">

        <label for="description">Nombre de Categoria</label>
        <input type="text" name="description" value="{{$category->description}}" class="form-control"
        placeholder="Ingrese nombre de categoria">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif        
      </div>

      <p class='alert alert-dark'>Seleccione tipo de Talle para la categoria</p>
    <hr>           
    <div class='row'>
      @foreach ($waists as $waist)
        <div class='col-md-4'>
          <p class='alert alert-dark'>
            @php ($i = 0)
            @foreach ($categoryWaistNow as $item)
              @if ($item->type == $waist->type)
                @php ($i = 1)  
              @endif              
            @endforeach
            @if ($i == 1)
              <input type="checkbox" checked name="type[]" value="{{$waist->type}}">Tipo Talle: {{$waist->type}}<br>
            @else
              <input type="checkbox"  name="type[]" value="{{$waist->type}}">Tipo Talle: {{$waist->type}}<br>
            @endif
            
            <!-- <input class='from-control' type="radio" name="type" value="{{$waist->type}}"> Tipo Talle: {{$waist->type}} -->
          </p>
          <ul>
          @foreach ($waist_details as $detail)
            @if ($detail->type == $waist->type)
              
                <li>{{$detail->description}}</li>
              
            @endif
            
          @endforeach
          </ul>           
        </div>   
      @endforeach
    </div>

      <button type="submit" class="btn btn-dark" name="button">Modificar Categoria</button>
    </form>
    <hr>
  </div>
@endsection
