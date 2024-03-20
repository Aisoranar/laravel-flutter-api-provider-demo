<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importar el modelo User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un administrador
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'birthdate' => '2001-01-01',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), 
            'is_admin' => true, // Marcar como administrador
        ]);

     
    }
}
