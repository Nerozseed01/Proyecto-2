@extends('partials.template')

@section('title', 'Lista de profesores')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">

      <div class="col-6">
        <div class="d-flex my-3 justify-content-between align-items-baseline">
          <h2>Editar profesor</h2>
          <a href="{{ route('teachers.index') }}" class="btn btn-outline-primary">
            Regresar
            <i class="bi bi-backspace mx-2"></i>
          </a>
        </div>
        <hr>

        {{-- Formulario --}}
        <form action="{{ route('teachers.update', $teacher) }}" method="POST">
            @csrf
            @method('PATCH')
          <div class="mb-3">
            <label for="name" class="form-label">Nombre del profesor</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre"
            value="{{ $teacher->name }}">
            @error('name')
                <div id="name" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="group-input mb-3">
            <label for="">Universidad</label>
            <select class="form-select" name="university_id">
                <option selected value="{{ $teacher->university->id }}">
                    {{ $teacher->university->name }}
                </option>
                @foreach ( $universities as $university )
                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
            </select>
            @error('university_id')
                <div id="name" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>


          <div class="group-input mb-3">
            <label for="">Departamento</label>
            <select class="form-select" name="department_id">
              <option selected value="{{ $teacher->department->id }}">
                {{ $teacher->department->name }}
              </option>
                @foreach ( $departments as $department )
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id')
                <div id="name" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>


          <div class="group-input mb-3">
            <label for="">Campus  </label>
            <select class="form-select" name="center_id">
              <option selected value="{{ $teacher->center->id }}">
                  {{ $teacher->center->name }}
              </option>
                @foreach ( $centers as $center )
                <option value="{{ $center->id }}">{{ $center->name }}</option>
                @endforeach
            </select>
            @error('center_id')
                <div id="name" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          {{--  Button send  --}}
          <div class="d-flex justify-content-between">
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-send mx-1"></i>
                  Editar
                </button>
            </form>
            <a href="{{ route('teachers.create') }}" class="btn btn-outline-danger">
              Cancelar
            </a>
          </div>
        </form>


      </div>
    </div>
  </div>

@endsection
