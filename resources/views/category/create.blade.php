@extends('layouts.app')
@section('content')
<div class='container'>

    <form class="" action="/category/create" method="post">
      <div class="form-group @if($errors->has('description')) has-danger @endif">
        {{csrf_field()}}
        <p class='alert alert-dark' for="description">Nombre de Categoria</p>        
        <input type="text" name="description" value="" class="form-control"
        placeholder="Ingrese nombre de categoria">
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
        <br>
      </div>
      <p class='alert alert-dark'>Seleccione tipo de Talle para la categoria</p>
      <br>      
      <div class="row">
        @foreach ($waists as $waist)

        <div class='col-md-4'>
          <p class='alert alert-danger'>
            <input class='from-control' type="radio" name="type" value="{{$waist->type}}"> Tipo Talle: {{$waist->type}}
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
        <div class='alert alert-dark'><button type="submit" class="btn btn-danger" name="button">Crear Categoria</button></div>    
        </div>  
    </form>
   <!-- end row   -->
</div> <!-- end container   -->
@endsection
