@extends('layouts.app')
@section('content')

    <h1>Categorias</h1>
    <a class="btn btn-success mb-3" href="{{route('categorias.create')}}">Nueva Categoria</a>
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
                            <a class="btn btn-success" href="{{route('categorias.show',['categoria'=> $item->id])}}">Ver</a>
                            <a class="btn btn-success" href="{{route('categorias.edit',['categoria'=> $item->id])}}">Editar</a>
                            <form method="POST" class="d-inline" action="{{route('categorias.destroy',['categoria'=>$item->id])}}">
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
    
