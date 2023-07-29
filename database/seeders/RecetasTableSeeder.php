<?php

namespace Database\Seeders;

use App\Models\Receta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Receta::factory(10)->create();
    }
}
