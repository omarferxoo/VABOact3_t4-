@extends('layouts.app')

@section('title', 'Editar curso')

@section('content')
    <div class="bg-white border rounded-3 shadow-sm p-4">
        <h1 class="h3 mb-4">Editar curso</h1>
        <form action="{{ route('cursos.update', $curso) }}" method="post">
            @method('PUT')
            @include('cursos._form')
        </form>
    </div>
@endsection
