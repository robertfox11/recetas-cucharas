<?php

namespace Database\Seeders;

use App\Models\CategoriaReceta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaRecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define las categorías de recetas que deseas crear
        $categorias = [
            'Desayuno',
            'Almuerzo',
            'Cena',
            'Postre',
            'Bebida',
        ];
        // Crea las categorías en la base de datos
        foreach ($categorias as $categoria) {
            CategoriaReceta::create([
                'nombre_categoria' => $categoria,
            ]);
        }
    }
}
