@extends('layouts.master')
@section('content')

    <h1>Productos</h1>
    <a class="btn btn-success" href="{{route('productos.create')}}">Nuevo producto</a>

    @empty($productos)
        <div class="alert-warning">Sin productos</div>
    
    @else

        <div class = "table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Visible</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                    <tr>
                        @if ($item->urlImg!="default")
                        <td><img src="/storage{{$item->urlImg}}" width="150" height="100"/></td>
                            
                        @else
                            <td>sin imagen</td>
                        @endif
                        <td>{{$item->strNombre}}</td>
                        <td>{{$item->intVisible}}</td>
                        <td>{{$item->strDescripcion}}</td>
                        <td>{{$item->dcPrecio}}</td>
                        
                        <td>{{$item->categoria_id}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('productos.show',['producto'=> $item->id])}}">Ver</a>
                            <a class="btn btn-success" href="{{route('productos.edit',['producto'=> $item->id])}}">Editar</a>
                        
                            <form method="POST" action="{{route('productos.destroy',['producto'=>$item->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Eliminar</button>
                                </form></td>
                        {{-- <th><img src="storage\app\{{$item->urlImg}}" alt="" width="100" height="100"></th> --}}
                       
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty

@endsection
    
