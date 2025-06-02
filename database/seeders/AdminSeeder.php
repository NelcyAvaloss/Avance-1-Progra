<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // database/seeders/AdminSeeder.php
// database/seeders/AdminSeeder.php
User::updateOrCreate(
    ['email' => 'admin@biblioteca.com'],
    [
        'name' => 'Administrador',
        'password' => Hash::make('admin123'),
        'rol' => 'admin',
        'estado' => 'habilitado',
        'universidad' => 'UGB',
        'idioma' => 'es',
        'tema' => 'claro',
        'notificaciones' => true
    ]
);


    }
}

