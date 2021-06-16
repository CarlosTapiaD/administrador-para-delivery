@extends('layouts.app')
@section('content')

<h1>Editar direccion</h1>
    
<form method="POST" action="{{route('direccions.update',['direccion'=>$direccion->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="row">
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="calles">Direccion</label>
        <input type="numeric" step="0.01" class="form-control" name="calles" value="{{$direccion->calles}}" required>
    </div>


    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="cp">CP</label>
        <input type="numeric" step="0.01" class="form-control" name="cp" value="{{$direccion->cp}}" required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" value="{{$direccion->estado}}" required>
    </div>
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" name="ciudad" value="{{$direccion->ciudad}}" required>
    </div>
    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="colonia">Colonia</label>
        <input type="text" class="form-control" name="colonia" value="{{$direccion->colonia}}"  required>
    </div>

    <div  class="col-lg-4 col-md-6 ms-12 mt-3">
        <label for="tel">Telefono</label>
        <input type="text" class="form-control" name="tel" value="{{$direccion->tel}}" required>
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


@endsection