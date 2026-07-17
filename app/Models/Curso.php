<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'titulo',
        'descripcion',
        'instructor',
        'duracion_horas',
        'precio',
        'fecha_inicio',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'precio' => 'decimal:2',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(Alumno::class)->withTimestamps();
    }
}
