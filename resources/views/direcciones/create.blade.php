@extends('layouts.app')
@section('content')

<h1>Agregar direccion</h1>
<form method="POST" action="{{route('direccions.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="row">
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="calles">Direccion</label>
        <input type="numeric" step="0.01" class="form-control" name="calles" value="{{old('direccion')}}" required>
    </div>


    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="cp">CP</label>
        <input type="numeric" step="0.01" class="form-control" name="cp" value="{{old('cp')}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" value="{{old('estado')}}" required>
    </div>
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" name="ciudad" value="{{old('ciudad')}}" required>
    </div>
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="colonia">Colonia</label>
        <input type="text" class="form-control" name="colonia" value="{{old('colonia')}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="tel">Telefono</label>
        <input type="text" class="form-control" name="tel" value="{{old('tel')}}" required>
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