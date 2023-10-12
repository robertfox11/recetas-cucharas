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
            'email' => env('EMAIL_ADMIN', 'admin@example.com'), // Usamos 'admin@example.com' como valor predeterminado si la variable no está definida.
            'password' => Hash::make(env('PASS_ADMIN')),
        ]);

//        // Crear usuario regular
//        User::create([
//            'name' => 'Usuario Regular',
//            'email' => 'user@example.com',
//            'password' => Hash::make('user'),
//        ]);
    }
}
