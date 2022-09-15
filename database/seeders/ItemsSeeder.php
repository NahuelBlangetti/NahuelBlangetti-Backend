<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Espada Cruzada',
            'type' => 3,
            'cant_ataque' => 10,
            'cant_defensa' => 0
        ]);
        DB::table('items')->insert([
            'name' => 'Escudo Mortal',
            'type' => 2,
            'cant_ataque' => 0,
            'cant_defensa' => 5
        ]);
        DB::table('items')->insert([
            'name' => 'Velocidad Mediana',
            'type' => 1,
            'cant_ataque' => 0,
            'cant_defensa' => 0
        ]);

        DB::table('items')->insert([
            'name' => 'Espada Thor',
            'type' => 3,
            'cant_ataque' => 5,
            'cant_defensa' => 0
        ]);
        DB::table('items')->insert([
            'name' => 'Escudo del Capitan America',
            'type' => 2,
            'cant_ataque' => 0,
            'cant_defensa' => 10
        ]);
        DB::table('items')->insert([
            'name' => 'Velocidad Alta',
            'type' => 1,
            'cant_ataque' => 0,
            'cant_defensa' => 5
        ]);
    }
}
