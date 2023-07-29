<?php

namespace Database\Seeders;

use App\Models\CategoriaReceta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasRecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaReceta::factory(5)->create();
    }
}
