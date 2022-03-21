@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-body p-5 shadow">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{--  Email  --}}
                    <div class="form-group row mb-1">
                        <label for="email" class="p-0">{{ __('Correo:') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            </span>
                        @enderror
                    </div>

                    {{--  Password  --}}
                    <div class="form-group row mb-2">
                        <label for="password" class="p-0">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                </span>
                            @enderror
                    </div>

                    {{--  Remember  --}}
                    <div class="form-group row mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Recordar sesión') }}
                            </label>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary shadow">
                            {{ __('Ingresar') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link btn-sm mt-2" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
