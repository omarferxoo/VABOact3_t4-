<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'email'];

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class)->withTimestamps();
    }
}
