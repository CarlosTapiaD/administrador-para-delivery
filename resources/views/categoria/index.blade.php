@extends('layouts.master')
@section('content')

    <h1>Categorias</h1>
    <a class="btn btn-success" href="{{route('categoria.create')}}">Nueva Categoria</a>
    @empty($categorias)
        <div class="alert-warning">Sin categorias</div>
    
    @else

        <div class = "table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Visible</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                    <tr>
                        <td><img src="/storage{{$item->urlImg}}" width="150" height="100"/></td>
                        <td>{{$item->strNombre}}</td>
                        <td>{{$item->intVisible}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('categoria.show',['categoria'=> $item->id])}}">Ver</a>
                            <a class="btn btn-success" href="{{route('categoria.edit',['categoria'=> $item->id])}}">Editar</a>
                            <form method="POST" action="{{route('categoria.destroy',['categoria'=>$item->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Eliminar</button>
                            </form>
                        </td>
                       
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty

@endsection
    
