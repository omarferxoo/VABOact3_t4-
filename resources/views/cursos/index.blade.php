@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Catalogo de cursos</h1>
            <p class="text-secondary mb-0">CRUD en Laravel 12 con Eloquent, seeders, factories, paginacion y relaciones.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('cursos.create') }}">Registrar curso</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Curso</th>
                        <th>Categoria</th>
                        <th>Instructor</th>
                        <th>Horas</th>
                        <th>Precio</th>
                        <th>Alumnos</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cursos as $curso)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $curso->titulo }}</div>
                                <div class="small text-secondary">Inicia: {{ $curso->fecha_inicio->format('d/m/Y') }}</div>
                            </td>
                            <td><span class="badge text-bg-info">{{ $curso->categoria->nombre }}</span></td>
                            <td>{{ $curso->instructor }}</td>
                            <td>{{ $curso->duracion_horas }}</td>
                            <td>${{ number_format($curso->precio, 2) }}</td>
                            <td>{{ $curso->alumnos->count() }}</td>
                            <td class="text-end">
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('cursos.show', $curso) }}">Ver</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('cursos.edit', $curso) }}">Editar</a>
                                <form class="d-inline" action="{{ route('cursos.destroy', $curso) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Deseas eliminar este curso?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-secondary py-4" colspan="7">No hay cursos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $cursos->links() }}
    </div>
@endsection
