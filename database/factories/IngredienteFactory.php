<?php

namespace Database\Factories;

use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingrediente>
 */
class IngredienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ingrediente::class;
    public function definition(): array
    {
        return [
            'nombre_ingrediente' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'categoria' => $this->faker->randomElement(['carnes', 'verduras', 'frutas', 'lácteos', 'otros']),
        ];
    }
}
