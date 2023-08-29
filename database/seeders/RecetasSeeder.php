<?php

namespace Database\Seeders;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use App\Models\Ingrediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos todas las categorías de recetas existentes en la base de datos
        $categorias = CategoriaReceta::all();

        // Creamos 10 recetas dummy
        Receta::factory(10)->create()->each(function ($receta) use ($categorias) {
            // Asignar una categoría de receta aleatoria a cada receta
            $receta->categoria_id = $categorias->random()->id;
            $receta->save();

            // Asignar ingredientes aleatorios (en este ejemplo, asignamos entre 3 y 5 ingredientes)
            $ingredientes = Ingrediente::inRandomOrder()->limit(rand(3, 5))->get();
            $receta->ingredientes()->attach($ingredientes->pluck('id'));
        });
    }
}
