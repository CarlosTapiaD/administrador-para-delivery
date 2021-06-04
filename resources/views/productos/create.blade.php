@extends('layouts.app')
@section('content')

<h1>Crear Productos</h1>
<form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <label for="strNombre">Nombre</label>
        <input type="text" class="form-control" name="strNombre" value="{{old('strNombre')}}" required>
    </div>

    <div class="form-row">
        <label for="strDescripcion">Descripcion</label>
        <input type="text" class="form-control" name="strDescripcion" value="{{old('strDescripcion')}}" required>
    </div>

    <div class="form-row">
        <label for="dcPrecio">Precio</label>
        <input type="text" class="form-control" name="dcPrecio" value="{{old('dcPrecio')}}" required>
    </div>

    <div class="form-row">
        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" class="custom-select">
            <option value="1" {{old('categoria_id') == "1" ? 'selected':''}}>categoria ejemplo</option>
            <option value="2" {{old('categoria_id') == "2" ? 'selected':''}}>categoria ejemplo 2</option>
          </select>
    </div>

    <div class="form-row">
        <label for="intVisible">Disponible</label>
        <select name="intVisible" class="custom-select">
            <option value="1" {{old('intVisible') == "1" ? 'selected':''}}>Si</option>
            <option value="0" {{old('intVisible') == "0" ? 'selected':''}}>No</option>
          </select>
    </div>
    <div class="form-row">
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