<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::query()->inRandomOrder()->value('id') ?? Categoria::factory(),
            'titulo' => fake()->randomElement([
                'Laravel desde cero',
                'PHP moderno',
                'MySQL practico',
                'Fundamentos de redes',
                'Bootstrap para interfaces',
                'Control de versiones con Git',
                'Introduccion a Linux',
                'APIs REST con Laravel',
                'Seguridad web basica',
                'JavaScript para formularios',
            ]) . ' ' . fake()->unique()->numberBetween(1, 99),
            'descripcion' => fake()->paragraph(2),
            'instructor' => fake()->name(),
            'duracion_horas' => fake()->numberBetween(12, 80),
            'precio' => fake()->randomFloat(2, 250, 2500),
            'fecha_inicio' => fake()->dateTimeBetween('+1 week', '+5 months')->format('Y-m-d'),
        ];
    }
}
