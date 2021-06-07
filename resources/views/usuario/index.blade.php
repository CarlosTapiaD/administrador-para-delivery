@extends('layouts.app')
@section('content')

    <h1>Usuarios</h1>
    @empty($usuarios)
        <div class="alert-warning">Sin categorias</div>
    
    @else

        <div class = "table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Codigo Postal</th>
                        <th>Tipo Usuario</th>
                        <th>Telefono</th>
                        <th>Nota</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->strDireccion}}</td>
                        <td>{{$item->strCP}}</td>
                        <td>{{$item->strTipoUsuario}}</td>
                        <td>{{$item->strTelefono}}</td>
                        <td>{{$item->strNota}}</td>
                        <td>{{$item->strEstado}}</td>
                        <td>{{$item->id}}</td>
                       
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endempty

        @endsection
    
