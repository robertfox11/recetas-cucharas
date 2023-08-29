<?php

namespace Database\Factories;

use App\Models\CategoriaReceta;
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
            'titulo' => $this->faker->words(3, true),
            'descripcion' => $this->faker->paragraph(2),
            'instrucciones_preparacion' => $this->faker->paragraph(3),
            'tiempo_preparacion' => $this->faker->numberBetween(15, 120),
            'tiempo_coccion' => $this->faker->numberBetween(10, 90),
            'porciones' => $this->faker->numberBetween(1, 6),
            'dificultad' => $this->faker->randomElement(['Fácil', 'Moderada', 'Difícil']),
            'calificacion_promedio' => $this->faker->randomFloat(2, 0, 5),
            'activo' => true,
            'categoria_id' => CategoriaReceta::factory()->create()->id,
        ];
    }
}
