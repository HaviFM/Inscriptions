<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John',
                'surname' => 'Doe',
                'username' => 'johndoe',
                'password' => Hash::make('password123'), // Mot de passe hashé
                'email' => 'john@example.com',
                'tel' => '0123456789',
                'role_id' => 1, // Utilisateur
                'statut' => 'en_attente', // Statut de l'utilisateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'surname' => 'User',
                'username' => 'adminuser',
                'password' => Hash::make('adminpassword'), // Mot de passe hashé
                'email' => 'admin@example.com',
                'tel' => '9876543210',
                'role_id' => 2, // Admin
                'statut' => 'valide', // Statut de l'utilisateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'username' => 'janesmith',
                'password' => Hash::make('password456'), // Mot de passe hashé
                'email' => 'jane@example.com',
                'tel' => '0987654321',
                'role_id' => 1, // Utilisateur
                'statut' => 'refuse', // Statut de l'utilisateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
