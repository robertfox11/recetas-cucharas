<?php

namespace Database\Factories;

use App\Models\CategoriaReceta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriaReceta>
 */
class CategoriaRecetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CategoriaReceta::class;
    public function definition(): array
    {
        return [
            'nombre_categoria' => $this->faker->word,
        ];
    }
}
