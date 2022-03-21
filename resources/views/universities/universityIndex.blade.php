@extends('partials.template')

@section('title', 'Lista de universidades')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">

        <div class="col-8">
            <div class="d-flex my-3 justify-content-between align-items-baseline">
            <h2>Lista de Universidades</h2>
            <a href="{{ route('universities.create') }}" class="btn btn-primary shadow">
                <i class="bi bi-plus-square mx-2"></i>
                Registrar nueva universidad
            </a>
            </div>

            {{-- Alerta --}}
            @if ( session('info') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            {{-- Table --}}
            <table class="table table-hover shadow mt-5 ">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>acción</th>
                </tr>
            </thead>
            <tbody>
                @if ( $universities->count() > 0 )
                    @foreach ( $universities as $university )
                    <tr>
                        <th>{{ $university->id }}</th>
                        <td>{{ $university->name }}</td>
                        <td  class="d-flex align-items-baseline gap-2">
                            {{-- Editar --}}
                            <a href="{{ route('universities.edit', $university) }}" class="btn btn-outline-primary btn-sm mr-3">
                            <i class="bi bi-pencil"></i>
                            Editar
                            </a>

                            {{-- Eliminar --}}
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$university->id}}">
                                <i class="bi bi-trash"></i>
                                Eliminar
                            </button>

                            {{-- Modal --}}
                            <div class="modal fade" id="modal-{{$university->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Estás seguro de eliminar a <b>{{ $university->name }}</b> de forma permanente?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('universities.destroy', $university) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$university->id}}">
                                            <i class="bi bi-trash"></i>
                                            Eliminar
                                        </button>
                                        </form>
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <div class="alert alert-primary" role="alert">
                        <b>No existen</b> registros en la base de datos
                    </div>
                @endif
            </tbody>
            </table>



        </div>

    </div>
  </div>

@endsection
