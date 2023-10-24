<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call(CategoriaRecetasTableSeeder::class);
//        $this->call(RecetasSeeder::class);
//        $this->call(IngredientesTableSeeder::class);
//        $this->call(IngredienteRecetaSeeder::class);
//        $this->call(ComentariosTableSeeder::class);
//        $this->call(FotosTableSeeder::class);
//        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => env('EMAIL_ADMIN', 'admin@example.com'), // Usamos 'admin@example.com' como valor predeterminado si la variable no está definida.
             'password' => Hash::make(env('PASS_ADMIN')),
         ]);
    }
}
