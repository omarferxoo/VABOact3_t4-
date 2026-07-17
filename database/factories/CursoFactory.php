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
        $faker = \Faker\Factory::create('es_MX');

        return [
            'categoria_id' => Categoria::query()->inRandomOrder()->value('id') ?? Categoria::factory(),
            'titulo' => $faker->randomElement([
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
            ]) . ' ' . $faker->unique()->numberBetween(1, 99),
            'descripcion' => $faker->paragraph(2),
            'instructor' => $faker->name(),
            'duracion_horas' => $faker->numberBetween(12, 80),
            'precio' => $faker->randomFloat(2, 250, 2500),
            'fecha_inicio' => $faker->dateTimeBetween('+1 week', '+5 months')->format('Y-m-d'),
        ];
    }
}
