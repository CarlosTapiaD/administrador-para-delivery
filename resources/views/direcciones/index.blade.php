@extends('layouts.app')
@section('content')

    <h1>Direccion</h1>
    
    @empty($user->direccion)
    <a class="btn btn-success mb-3" href="{{route('direccions.create')}}">Agregar direccion</a>
    
    @else

    <div class="card" >
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Direccion: <br>{{$user->direccion->calles}}</li>
            <li class="list-group-item">Codigo postal:<br> {{$user->direccion->cp}}</li>
            <li class="list-group-item">Estado: <br>{{$user->direccion->estado}}</li>
            <li class="list-group-item">Ciudad:<br> {{$user->direccion->ciudad}}</li>
            <li class="list-group-item">Colonia: <br> {{$user->direccion->colonia}}</li><li class="list-group-item">Telefono: <br> {{$user->direccion->tel}}</li>
            <li class="list-group-item">
                <a class="btn btn-success" href="{{route('direccions.edit',['direccion'=> $user->direccion->id])}}">Editar</a>
                            <form method="POST" class="d-inline" action="{{route('direccions.destroy',['direccion'=>$user->direccion->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Eliminar</button>
                            </form>
            </li>


        </ul>
      </div>

      
    @endempty

@endsection
    
