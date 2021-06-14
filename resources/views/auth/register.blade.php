@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contrasena') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contrasena') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- aqui empieza lo modificado --}}
                        {{-- strDireccion --}}
                        {{-- <div class="form-group row">
                            <label for="strDireccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="strDireccion" type="text" class="form-control @error('strDireccion') is-invalid @enderror" name="strDireccion" value="{{ old('strDireccion') }}"  autocomplete="strDireccion" autofocus>

                                @error('strDireccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        {{--  strCP--}}
                        {{-- <div class="form-group row">
                            <label for="strCP" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>

                            <div class="col-md-6">
                                <input id="strCP" type="text" class="form-control @error('strCP') is-invalid @enderror" name="strCP" value="{{ old('strCP') }}"  autocomplete="strCP" autofocus>

                                @error('strCP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- strTipoUsuario --}}
                        {{-- <div class="form-group row">
                            <label for="strTipoUsuario" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Usuario') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="strTipoUsuario" type="text" class="form-control @error('strTipoUsuario') is-invalid @enderror" name="strTipoUsuario" value="{{ old('strTipoUsuario') }}"  autocomplete="strTipoUsuario" autofocus> --}}
                                {{-- <select name="strTipoUsuario" class="custom-select">
                                    <option value="admin" {{old('strTipoUsuario') == "admin" ? 'selected':''}}>Admin</option>
                                    <option value="repartidor" {{old('strTipoUsuario') == "repartidor" ? 'selected':''}}>Repartidor</option>
                                  </select>

                                @error('strTipoUsuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}} 
                        {{-- strTelefono --}}

                        {{-- <div class="form-group row">
                            <label for="strDireccion" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="strTelefono" type="text" class="form-control @error('strTelefono') is-invalid @enderror" name="strTelefono" value="{{ old('strTelefono') }}"  autocomplete="strTelefono" autofocus>

                                @error('strTelefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- strEstado --}}

                        {{-- <div class="form-group row">
                            <label for="strEstado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input id="strEstado" type="text" class="form-control @error('strEstado') is-invalid @enderror" name="strEstado" value="{{ old('strEstado') }}"  autocomplete="strEstado" autofocus>

                                @error('strEstado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- strNota --}}

                        {{-- <div class="form-group row">
                            <label for="strNota" class="col-md-4 col-form-label text-md-right">{{ __('Nota') }}</label>

                            <div class="col-md-6">
                                <input id="strNota" type="text" class="form-control @error('strNota') is-invalid @enderror" name="strNota" value="{{ old('strNota') }}"  autocomplete="strNota" autofocus>

                                @error('strNota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        {{--  --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
