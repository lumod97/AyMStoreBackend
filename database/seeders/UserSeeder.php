<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'), // Contraseña común para todos los usuarios
        ]);

        // Crear usuarios ficticios con la misma contraseña
        User::factory(10)->create([
            'password' => Hash::make('123456'), // Contraseña común para todos los usuarios ficticios
        ]);
    }
}
