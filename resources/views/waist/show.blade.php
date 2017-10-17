@extends('layouts.app')
@section('content')
  <h1>Talle id:{{$waist->id}}</h1>
  <p>{{$waist->description}}</p>
  <a class="btn btn-success" href="/waist/create">Crear nuevo talle de producto</a>
@endsection
