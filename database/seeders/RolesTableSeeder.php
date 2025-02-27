<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Utilisateur'], // Utilisateur avec id 1
            ['id' => 2, 'name' => 'Admin'], // Admin avec id 2
        ]);
    }
}
