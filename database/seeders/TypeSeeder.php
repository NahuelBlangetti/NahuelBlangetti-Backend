<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('user_types')->insert([
            'name' => 'Humano'
        ]);
        DB::table('user_types')->insert([
            'name' => 'Zombie'
        ]);
    }
}
