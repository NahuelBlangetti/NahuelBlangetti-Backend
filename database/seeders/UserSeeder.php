<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'Admin@Admin.com'
        ]);
        DB::table('users')->insert([
            'name' => 'Nahuel',
            'type' => 1,
            'email' => 'Nahuel@Player1.com',
            'life' => 100
        ]);
        DB::table('users')->insert([
            'name' => 'Leonardo',
            'type' => 2,
            'email' => 'Leonardo@Player2.com',
            'life' => 100
        ]);
        DB::table('users')->insert([
            'name' => 'DeOnda',
            'email' => 'DeOnda@Player3.com',
            'type' => 1,
            'life' => 100,
            'ulti' => true
        ]);
    }
}
