@extends('layouts.master')
@section('content')

    <h1>Pedidos</h1>
    {{-- <a class="btn btn-success" href="{{route('.create')}}">Nueva Categoria</a> --}}

    @empty($pedidos)
        <div class="alert-warning">Sin Pedidos</div>
    
    @else

        <div class = "table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>intFolio</th>
                        <th>Nota</th>
                        <th>Estatus</th>
                        <th>Referencia</th>
                        <th>Cliente</th>
                        <th>Tipo Pago</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                    <tr>
                        <td>{{$item->intFolio}}</td>
                        <td>{{$item->strNota}}</td>
                        <td>{{$item->strEstatus}}</td>
                        <td>{{$item->strReferencia}}</td>
                        <td>{{$item->usuario_id}}</td>
                        <td>{{$item->strTP}}</td>
                        <td>opciones </td>
                       
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty

@endsection
    
