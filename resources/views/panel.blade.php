@extends('layouts.app')

@section('content')
<h1>Panel</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel Administrador') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{route('categorias.index')}}">Categorias</a>
                    </div>
                    <div class="list-group">
                        <a href="{{route('productos.index')}}">Productos</a>
                    </div>
                    <div class="list-group">
                        <a href="{{route('pedidos.index')}}">Pedidos</a>
                    </div>
                    <div class="list-group">
                        <a href="{{route('usuarios.index')}}">Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
