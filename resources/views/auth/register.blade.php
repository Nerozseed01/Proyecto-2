@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-body p-5 shadow">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{--  Name  --}}
                    <div class="form-group row">
                        <label for="name" class="p-0">{{ __('Nombre') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--  Email  --}}
                    <div class="form-group row">
                        <label for="email" class="p-0">{{ __('Correo') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--  Password  --}}
                    <div class="form-group row">
                        <label for="password" class="p-0">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--  Password confirm  --}}
                    <div class="form-group row mb-3">
                        <label for="password-confirm" class="p-0">{{ __('Confirmar contraseña') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    {{--  Regiseter button  --}}
                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary shadow">
                            {{ __('Registrarse') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
