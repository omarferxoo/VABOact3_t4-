<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CursoController extends Controller
{
    public function index(): View
    {
        $cursos = Curso::with(['categoria', 'alumnos'])
            ->latest()
            ->paginate(8);

        return view('cursos.index', compact('cursos'));
    }

    public function create(): View
    {
        return view('cursos.create', [
            'curso' => new Curso(),
            'categorias' => Categoria::orderBy('nombre')->get(),
            'alumnos' => Alumno::orderBy('nombre')->get(),
            'alumnosSeleccionados' => [],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateCurso($request);
        $alumnos = $data['alumnos'] ?? [];
        unset($data['alumnos']);

        $curso = Curso::create($data);
        $curso->alumnos()->sync($alumnos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    public function show(Curso $curso): View
    {
        $curso->load(['categoria', 'alumnos']);

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso): View
    {
        return view('cursos.edit', [
            'curso' => $curso,
            'categorias' => Categoria::orderBy('nombre')->get(),
            'alumnos' => Alumno::orderBy('nombre')->get(),
            'alumnosSeleccionados' => $curso->alumnos()->pluck('alumnos.id')->all(),
        ]);
    }

    public function update(Request $request, Curso $curso): RedirectResponse
    {
        $data = $this->validateCurso($request);
        $alumnos = $data['alumnos'] ?? [];
        unset($data['alumnos']);

        $curso->update($data);
        $curso->alumnos()->sync($alumnos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso): RedirectResponse
    {
        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateCurso(Request $request): array
    {
        return $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string'],
            'instructor' => ['required', 'string', 'max:120'],
            'duracion_horas' => ['required', 'integer', 'min:1'],
            'precio' => ['required', 'numeric', 'min:0'],
            'fecha_inicio' => ['required', 'date'],
            'alumnos' => ['nullable', 'array'],
            'alumnos.*' => ['exists:alumnos,id'],
        ]);
    }
}
