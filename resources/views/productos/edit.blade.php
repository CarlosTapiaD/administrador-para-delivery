@extends('layouts.app')
@section('content')

<h1>Crear Productos</h1>
<form method="POST" action="{{route('productos.update',['producto'=> $producto->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <label for="strNombre">Nombre</label>
        <input type="text" class="form-control" name="strNombre" value="{{$producto->strNombre}}" required>
    </div>

    <div class="form-row">
        <label for="strDescripcion">Descripcion</label>
        <input type="text" class="form-control" name="strDescripcion" value="{{$producto->strDescripcion}}" required>
    </div>

    <div class="form-row">
        <label for="dcPrecio">Precio</label>
        <input type="text" class="form-control" name="dcPrecio" value="{{$producto->dcPrecio}}" required>
    </div>

    <div class="form-row">
        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" class="custom-select">
            <option value="1" {{$producto->categoria_id=='1' ? 'selected' :''}}>categoria ejemplo</option>
            <option value="2" {{$producto->categoria_id=='2' ? 'selected' :''}} >categoria ejemplo 2</option>
          </select>
    </div>

    <div class="form-row">
        <label for="intVisible">Disponible</label>
        <select name="intVisible" class="custom-select">
            <option value="1" {{$producto->intVisible=='1' ? 'selected' :''}}>Si</option>
            <option value="0"  {{$producto->intVisible=='0' ? 'selected' :''}}>No</option>
          </select>
    </div>
    <div class="form-row">
        <img src="/storage{{$producto->urlImg}}" width="250" height="200"/>
    <input id="file" name="urlImg2" type="file" accept="image/*"/> <br>
    @error('urlImg')
        <small class="text-danger">{{$message}}</small>
    @enderror
    </div>
    {{-- <div class="form-row">
        <label for="urlImg">Precio</label>
        <input type="text" class="form-control" name="urlImg" >
    </div> --}}

    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lgg" >Guardar</button>
    </div>
    

    
    
</form>



@endsection