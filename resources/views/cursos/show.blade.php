@extends('layouts.app')

@section('title', $curso->titulo)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 mb-1">{{ $curso->titulo }}</h1>
            <p class="text-secondary mb-0">{{ $curso->categoria->nombre }} · {{ $curso->instructor }}</p>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('cursos.index') }}">Volver</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="bg-white border rounded-3 shadow-sm p-4">
                <h2 class="h5">Descripcion</h2>
                <p>{{ $curso->descripcion }}</p>
                <dl class="row mb-0">
                    <dt class="col-sm-4">Duracion</dt>
                    <dd class="col-sm-8">{{ $curso->duracion_horas }} horas</dd>
                    <dt class="col-sm-4">Precio</dt>
                    <dd class="col-sm-8">${{ number_format($curso->precio, 2) }}</dd>
                    <dt class="col-sm-4">Fecha de inicio</dt>
                    <dd class="col-sm-8">{{ $curso->fecha_inicio->format('d/m/Y') }}</dd>
                </dl>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-white border rounded-3 shadow-sm p-4">
                <h2 class="h5">Alumnos inscritos</h2>
                <ul class="list-group list-group-flush">
                    @foreach ($curso->alumnos as $alumno)
                        <li class="list-group-item px-0">
                            <div class="fw-semibold">{{ $alumno->nombre }}</div>
                            <div class="small text-secondary">{{ $alumno->email }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
