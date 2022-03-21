@extends('partials.template')

@section('title', 'Dashboar')

@section('content')


    <div class="container my-5">
        <div class="row alig">
            <div class="col-10">
                <h1>Contenido Principal</h1>
                <p></p>
            </div>
            <div class="col-2 d-flex justify-content-end align-items-baseline">
                <button class="btn btn-ligth" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </div>



    {{--  Menu verticla  --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Wikirpofes dashboar</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-primary mb-3 w-100">
                Profesores
            </a>
            <a href="{{ route('universities.index') }}" class="btn btn-outline-primary mb-3 w-100">
                Universidades
            </a>
            <a href="{{ route('departments.index') }}" class="btn btn-outline-primary mb-3 w-100">
                Departamentos
            </a>
            <a href="{{ route('centers.index') }}" class="btn btn-outline-primary mb-3 w-100">
                Centros universitarios
            </a>
            <a href="" class="btn btn-outline-primary mb-3 w-100 disabled">Roles</a>
        </div>
    </div>
@endsection
