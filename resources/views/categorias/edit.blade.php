@extends('layouts.app')
@section('content')

<h1>Crear Categoria</h1>
<form method="POST" action="{{route('categorias.update',['categoria'=> $categoria->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <label for="strNombre">Nombre</label>
        <input type="text" class="form-control" name="strNombre" value="{{$categoria->strNombre}}"  required>
    </div>

    <div class="form-row">
        <label for="intVisible">Disponible</label>
        <select name="intVisible" class="custom-select" >
            <option value="1" {{$categoria->intVisible=='1' ? 'selected' :''}}>Si</option>
            <option value="0"{{$categoria->intVisible=='0' ? 'selected' :''}} >No</option>
          </select>
    </div>
    <div class="form-row bt-3">
        <img src="/storage{{$categoria->urlImg}}" width="250" height="200"/>
    </div>
    <div class="form-row bt-3">
    <input id="file" name="urlImg2" type="file" accept="image/*" value=""/> <br>
    @error('urlImg')
        <small class="text-danger">{{$message}}</small>
    @enderror
    </div>
    {{-- <div class="form-row">
        <label for="urlImg">Precio</label>
        <input type="text" class="form-control" name="urlImg" >
    </div> --}}

    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lgg mt-3" >Guardar</button>
    </div>
    

    
    
</form>



@endsection