@csrf

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label" for="titulo">Titulo</label>
        <input class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo', $curso->titulo) }}" required>
        @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label" for="categoria_id">Categoria</label>
        <select class="form-select @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id" required>
            <option value="">Selecciona...</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $curso->categoria_id) == $categoria->id)>{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        @error('categoria_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label" for="descripcion">Descripcion</label>
        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
        @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label" for="instructor">Instructor</label>
        <input class="form-control @error('instructor') is-invalid @enderror" id="instructor" name="instructor" value="{{ old('instructor', $curso->instructor) }}" required>
        @error('instructor') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label" for="duracion_horas">Duracion (horas)</label>
        <input class="form-control @error('duracion_horas') is-invalid @enderror" id="duracion_horas" type="number" min="1" name="duracion_horas" value="{{ old('duracion_horas', $curso->duracion_horas) }}" required>
        @error('duracion_horas') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-2">
        <label class="form-label" for="precio">Precio</label>
        <input class="form-control @error('precio') is-invalid @enderror" id="precio" type="number" step="0.01" min="0" name="precio" value="{{ old('precio', $curso->precio) }}" required>
        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label" for="fecha_inicio">Fecha de inicio</label>
        <input class="form-control @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio" type="date" name="fecha_inicio" value="{{ old('fecha_inicio', optional($curso->fecha_inicio)->format('Y-m-d')) }}" required>
        @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label" for="alumnos">Alumnos inscritos</label>
        <select class="form-select @error('alumnos') is-invalid @enderror" id="alumnos" name="alumnos[]" multiple size="8">
            @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}" @selected(in_array($alumno->id, old('alumnos', $alumnosSeleccionados)))>{{ $alumno->nombre }} - {{ $alumno->email }}</option>
            @endforeach
        </select>
        <div class="form-text">Mantén presionada la tecla Ctrl para seleccionar varios alumnos.</div>
        @error('alumnos') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('cursos.index') }}">Cancelar</a>
    <button class="btn btn-primary" type="submit">Guardar</button>
</div>
