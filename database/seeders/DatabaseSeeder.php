<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 2, 'name' => 'Admin'], // Assurez-vous d'inclure l'ID 1
            ['id' => 1, 'name' => 'Utilisateur'],
        ]);
        
        DB::table('users')->insert([
            'name' => 'John',
            'surname' => 'Doe',
            'username' => 'johndoe',
            'tel' => '0102030405',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Assurez-vous que le rôle avec l'ID 1 existe dans `roles`
            'created_at' => now(),
            'updated_at' => now(),
        ]);
                
        // Vous pouvez aussi ajouter d'autres seeds ici selon vos besoins
    }
}
