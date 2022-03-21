@extends('partials.template')

@section('title', 'Lista de profesores')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">

            <div class="col-6">
                <div class="d-flex my-3 justify-content-between align-items-baseline">
                    <h2>Registrar nueva universidad</h2>
                    <a href="{{ route('universities.index') }}" class="btn btn-outline-primary">
                        Regresar
                        <i class="bi bi-backspace mx-2"></i>
                    </a>
                </div>
                <hr>

                {{-- Formulario --}}
                <form action="{{ route('universities.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la universidad</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                        @error('name')
                            <div id="name" class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Button send --}}
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send mx-1"></i>
                            Registrar
                        </button>
                        <a href="{{ route('universities.create') }}" class="btn btn-outline-danger">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
