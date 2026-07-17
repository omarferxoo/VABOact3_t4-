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
        return [
            'nombre' => $this->faker->unique()->randomElement([
                'Programacion',
                'Diseno Web',
                'Bases de Datos',
                'Servidores',
                'Productividad',
                'Ciberseguridad',
            ]),
            'descripcion' => $this->faker->sentence(10),
        ];
    }
}
