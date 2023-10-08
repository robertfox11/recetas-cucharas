<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => '11rsahome@gmail.com',
            'password' => Hash::make('RecetasAdmin112233@'),
        ]);

        // Crear usuario regular
        User::create([
            'name' => 'Usuario Regular',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
        ]);
    }
}
