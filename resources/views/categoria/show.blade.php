@extends('layouts.app')
@section('content')
    <h1>{{$categorias->strNombre}} </h1>
    <p>{{$categorias->intVisible}}</p>
    
@endsection