@extends('layouts.app')
@section('content')
<div class="container">    
    <h4>Seleccione Categoria</h4>    
    <div class='col-md-12'>
      <form class="" action="/product/selectcategory" method="post">
        {{csrf_field()}}

        <div class="form-group @if($errors->has('category_id')) has-danger @endif">
          <label for="marginClient">Categoria</label>
          <select class="form-control" name="category_id">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->description}}</option>
            @endforeach
          </select>
        </div>        
        <button type="submit" class="btn btn-success" name="button">Seleccionar</button>
      </form>
    </div>  
</div>    
@endsection
