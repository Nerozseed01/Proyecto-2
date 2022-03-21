@extends('partials.template')

@section('title', 'Lista de profesores')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">

      <div class="col-6">
        <div class="d-flex my-3 justify-content-between align-items-baseline">
          <h2>Editar departamento</h2>
          <a href="{{ route('teachers.index') }}" class="btn btn-outline-primary">
            Regresar
            <i class="bi bi-backspace mx-2"></i>
          </a>
        </div>
        <hr>

        {{-- Formulario --}}
        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PATCH')
          <div class="mb-3">
            <label for="name" class="form-label">Nombre del departamento</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre"
            value="{{ old('name', $department->name) }}">
            @error('name')
                <div id="name" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>


          {{--  Button send  --}}
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-send mx-1"></i>
                Editar
            </button>
            <a href="{{ route('teachers.create') }}" class="btn btn-outline-danger">
                Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
