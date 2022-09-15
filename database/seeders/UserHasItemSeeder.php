<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_items')->insert([
            'user_id' => 2,
            'item_id' => 3,
        ]);
        DB::table('user_has_items')->insert([
            'user_id' => 2,
            'item_id' => 2,
        ]);
    }
}
