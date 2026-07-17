<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Categoria>
 */
class CategoriaFactory extends Factory
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
            'nombre' => $faker->unique()->randomElement([
                'Programacion',
                'Diseno Web',
                'Bases de Datos',
                'Servidores',
                'Productividad',
                'Ciberseguridad',
            ]),
            'descripcion' => $faker->sentence(10),
        ];
    }
}
