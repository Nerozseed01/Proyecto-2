@extends('partials.template')

@section('title', 'Lista de profesores')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <div class="row py-3">
                <div class="jumbotron-body d-flex justify-content-center align-items-center">
                    <div class="col-12 border rounded-5">
                        <div class="acercade rounded-5">
                            <div class="row p-4">
                                {{-- Profesor --}}

                                {{-- Contenido --}}
                                <h5 class="px-5">{{ $teacher->name }}</h5>
                                <div class="row">
                                    <div class="col-6 px-5">
                                        <!-- Datos generales -->
                                        <h6 class="text-secondary">Datos generales</h6>
                                        <p class="text-secondary bold d-block mb-1">
                                            <i class="bi bi-check-circle text-primary"></i>
                                            <b>Universidad:</b> {{ $teacher->university->name }}
                                        </p>
                                        <p class="text-secondary bold d-block mb-1">
                                            <i class="bi bi-check-circle text-primary"></i>
                                            <b>Departamento:</b> {{ $teacher->department->name }}
                                        </p>
                                        <p class="text-secondary bold d-block mb-1">
                                            <i class="bi bi-check-circle text-primary"></i>
                                            <b>Campus:</b> {{ $teacher->center->name }}
                                        </p>
                                        <h6 class="text-secondary bold mt-4">Materias</h6>
                                        @foreach ($teacher->subjects as $subject)
                                            <span class="badge rounded-pill bg-secondary">
                                                {{ $subject->code }}
                                            </span>
                                        @endforeach
                                    </div>



                                    <!-- Promedio -->
                                    <div class="col-6 px-5">
                                        <h6 class="text-secondary bold">Promedio ( basado en {{ $alumnos }}
                                            evaluaciones )</h6>

                                        <div class="d-flex justify-content-between">
                                            <p class="text-secondary bold d-block mb-1">
                                                <i class="bi bi-check-circle text-primary"></i>
                                                Dominio del tema:
                                            </p>
                                            <h6>{{ round($dominio, 0) }}%</h6>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="text-secondary bold d-block mb-1">
                                                <i class="bi bi-check-circle text-primary"></i>
                                                Puntualidad:
                                            </p>
                                            <h6>{{ round($puntualidad, 0) }}%</h6>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="text-secondary bold d-block mb-1">
                                                <i class="bi bi-check-circle text-primary"></i>
                                                Promedio de alumnos:
                                            </p>
                                            <h6>90%</h6>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="text-secondary bold d-block mb-1">
                                                <i class="bi bi-check-circle text-primary"></i>
                                                Dificultad del curso:
                                            </p>
                                            <h6>{{ round($dificultad, 0) }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- Body --}}
    <div class="container my-4">
        <div class="row gap-5 justify-content-lg-between">

            {{-- Primera columna --}}
            <div class="col-8 bg-white border rounded p-5">
                <div class="d-flex gap-5 justify-content-between mb-4">
                    <button type="button" class="btn btn-outline-primary w-100 fw-bold" data-bs-toggle="modal"
                        data-bs-target="#evaluar">
                        <i class="bi bi-card-checklist mx-2"></i>
                        Evaluar profesor
                    </button>

                    <button class="btn btn-outline-danger w-100 fw-bold" type="button">
                        <i class="bi bi-bug mx-2"></i>
                        Reportar profesor
                    </button>
                </div>

                {{-- Evaluaciones y filtros --}}
                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-secondary">Evaluaciones</h5>
                    <div class="filtros">
                        <a href="" class=" text-secondary mx-2">Relevantes</a>
                        <a href="" class=" text-secondary mx-2">Verificadas</a>
                        <a href="" class=" text-secondary mx-2">Recientes</a>
                        {{--  Button trigger modal  --}}
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-pencil"></i>
                            Comentar
                        </button>
                    </div>
                </div>

                @if ( session('info') )
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{-- Caja de comentariosk --}}
                @foreach ($teacher->comments as $comment)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="user">
                                    <i class="bi bi-check-square mx-1"></i>
                                    Un alumno evalúo el curso
                                    <span class="badge rounded-pill bg-secondary mx-1">
                                        {{ $comment->subject->code }}
                                    </span>
                                    @if ( Auth::user() )
                                        @if ( Auth::user()->id == $comment->user_id )
                                        <a href="">Editar</a>
                                        <a href="">Eliminar</a>
                                         @endif
                                    @endif
                                </div>
                                <div class="fecha">
                                    {{ date('d/m/y', strtotime($comment->created_at)) }}
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $comment->description }}
                            </li>
                        </ul>
                    </div>
                @endforeach


            </div>

            {{-- Segunda columna --}}
            <div class="col-3 p-5 bg-white border rounded">
                <div class="d-grid gap-2">
                    <div class="d-flex justify-content-center">
                        <h5>Materiales de apoyo</h5>

                    </div>
                </div>
            </div>

        </div>
    </div>




    {{-- Modal comentarios --}}
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Completa los siguientes campos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comments.store', $teacher) }}" method="POST">
                        @csrf
                        {{-- User id--}}
                        <input type="hidden" value="@if ( Auth::user() ) {{ Auth::user()->id }} @endif" name="user_id">
                        {{-- Teacher id --}}
                        <input type="hidden" value="{{ $teacher->id }}" name="teacher_id">


                        <div class="mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="subject_id" name="subject_id"
                                    aria-label="Floating label select example">
                                    @foreach ($teacher->subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->code }}</option>
                                    @endforeach
                                </select>
                                <label for="subject_id">Selecciona una clave de materia</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Comentario:</label>
                            <textarea name="description" class="form-control" id="description" style="height: 150px"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">cancelar</button>
                            @if ( Auth::user() )
                                <button type="submit" class="btn btn-primary btn-sm">Guardar comentario</button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Guardar comentario</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
