@extends('layouts.master')
@section('content')

<h1>Crear usuarios</h1>
<form method="POST" action="{{route('usuario.store')}}">
    @csrf
    <div class="form-row">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-row">
        <label for="email">Correo</label>
        <input type="text" class="form-control" name="email" required>
    </div>
    <div class="form-row">
        <label for="password">Contrasena</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-row">
        <label for="strDireccion">Direccion</label>
        <input type="text" class="form-control" name="strDireccion" required>
    </div>
    <div class="form-row">
        <label for="strCP">Codigo Postal</label>
        <input type="text" class="form-control" name="strCP" required>
    </div>
    <div class="form-row">
        <label for="strEstado">Estado</label>
        <input type="text" class="form-control" name="strEstado" required>
    </div>
    <div class="form-row">
        <label for="strTipoUsuario">Tipo Usuario</label>
        <select name="strTipoUsuario" class="custom-select">
            <option value="admin"selected>Administrador</option>
            <option value="conductor" >Conductor</option>
          </select>
    </div>
    <div class="form-row">
        <label for="strTelefono">Telefomo</label>
        <input type="text" class="form-control" name="strTelefono" required>
    </div>
    <div class="form-row">
        <label for="strNota">Nota</label>
        <input type="text" class="form-control" name="strNota" required>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lgg">Guardar</button>
    </div>
    
</form>



@endsection