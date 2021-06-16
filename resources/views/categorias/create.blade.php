@extends('layouts.app')
@section('content')

<h1>Crear Categoria</h1>
<form method="POST" action="{{route('categorias.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <label for="strNombre">Nombre</label>
        <input type="text" class="form-control" name="strNombre" value="{{old('strNombre')}}" required>
    </div>

    <div class="form-row">
        <label for="intVisible">Disponible</label>
        <select name="intVisible" class="custom-select">
            <option value="1"selected>Si</option>
            <option value="0" >No</option>
          </select>
    </div>
    <div class="form-row">
    <input id="file" name="urlImg2" type="file" accept="image/*"/> <br>
    <img id="img" src="" alt="" height="300"    width="500" hidden>
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

<script>    
document.getElementById('file').addEventListener('change',function(){
  //  alert();
  document.getElementById('img').src=URL.createObjectURL(document.getElementById('file').files[0]);
  document.getElementById('img').hidden=false;
})
</script>


@endsection