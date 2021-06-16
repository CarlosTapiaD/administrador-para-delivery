@extends('layouts.app')
@section('content')

<h1>Crear Productos</h1>
<form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="row">

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="strNombre">Nombre</label>
        <input type="text" class="form-control" name="strNombre" value="{{old('strNombre')}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="strDescripcion">Descripcion</label>
        <input type="text" class="form-control" name="strDescripcion" value="{{old('strDescripcion')}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="dcPrecio">Precio</label>
        <input type="numeric" step="0.01" class="form-control" name="dcPrecio" value="{{old('dcPrecio')}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" class="custom-select">
            <option value="1" {{old('categoria_id') == "1" ? 'selected':''}}>categoria ejemplo</option>
            <option value="2" {{old('categoria_id') == "2" ? 'selected':''}}>categoria ejemplo 2</option>
          </select>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="intVisible">Disponible</label>
        <select name="intVisible" class="custom-select">
            <option value="1" {{old('intVisible') == "1" ? 'selected':''}}>Si</option>
            <option value="0" {{old('intVisible') == "0" ? 'selected':''}}>No</option>
          </select>
    </div>
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
    <input id="file" name="urlImg2" type="file" accept="image/*"/> <br>
    @error('urlImg')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <img id="img" src="" alt="" height="300px" width="300px">
    </div>
    {{-- <div class="form-row">
        <label for="urlImg">Precio</label>
        <input type="text" class="form-control" name="urlImg" >
    </div> --}}

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <button type="submit" class="btn btn-primary btn-lgg mt-3" >Guardar</button>
    </div>

   </div>



</form>


<script>
    document.getElementById('file').addEventListener('change',function(){
  //  alert();
    document.getElementById('img').src=URL.createObjectURL(document.getElementById('file').files[0]);
})
</script>


@endsection
