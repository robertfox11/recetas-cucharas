<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredienteRecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las recetas y todos los ingredientes
        $recetas = Receta::all();
        $ingredientes = Ingrediente::all();

        // Asignar ingredientes aleatorios a cada receta
        foreach ($recetas as $receta) {
            // Seleccionar un número aleatorio de ingredientes (entre 2 y 5) para cada receta
            $ingredientesAleatorios = $ingredientes->random(rand(2, 5));

            // Asignar los ingredientes a la receta mediante la relación "ingredientes"
            $receta->ingredientes()->attach($ingredientesAleatorios);
        }
    }
}
