<?php

namespace Database\Factories;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receta>
 */
class RecetaFactory extends Factory
{
    protected $model = Receta::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(2),
            'instrucciones_preparacion' => $this->faker->paragraph(3),
            'tiempo_preparacion' => $this->faker->numberBetween(10, 120),
            'tiempo_coccion' => $this->faker->numberBetween(10, 120),
            'porciones' => $this->faker->numberBetween(1, 10),
            'dificultad' => $this->faker->randomElement(['Fácil', 'Moderada', 'Difícil']),
            'calificacion_promedio' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
