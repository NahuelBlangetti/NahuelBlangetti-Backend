<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_types')->insert([
            'name' => 'Bota'
        ]);
        DB::table('item_types')->insert([
            'name' => 'Armadura'
        ]);
        DB::table('item_types')->insert([
            'name' => 'Arma'
        ]);
    }
}
