<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categorias = Categoria::factory()->count(5)->create();
        $alumnos = Alumno::factory()->count(30)->create();

        Curso::factory()
            ->count(24)
            ->create([
                'categoria_id' => fn () => $categorias->random()->id,
            ])
            ->each(function (Curso $curso) use ($alumnos): void {
                $curso->alumnos()->attach(
                    $alumnos->random(rand(3, 8))->pluck('id')->all()
                );
            });
    }
}
