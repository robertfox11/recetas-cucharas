<?php

namespace Database\Factories;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comentario::class;
    public function definition(): array
    {
        return [
            'receta_id' => 1, // ID de la receta relacionada (cambiar según tus datos)
            'nombre_autor' => $this->faker->name,
            'correo_autor' => $this->faker->email,
            'comentario' => $this->faker->paragraph,
        ];
    }
}
