<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtaqueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ataque_types')->insert([
            'name' => 'Cuerpo a cuerpo'
        ]);
        DB::table('ataque_types')->insert([
            'name' => 'A distancia'
        ]);
        DB::table('ataque_types')->insert([
            'name' => 'Ulti'
        ]);
    }
}
