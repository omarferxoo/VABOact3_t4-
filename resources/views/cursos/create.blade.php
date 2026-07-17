@extends('layouts.app')

@section('title', 'Registrar curso')

@section('content')
    <div class="bg-white border rounded-3 shadow-sm p-4">
        <h1 class="h3 mb-4">Registrar curso</h1>
        <form action="{{ route('cursos.store') }}" method="post">
            @include('cursos._form')
        </form>
    </div>
@endsection
