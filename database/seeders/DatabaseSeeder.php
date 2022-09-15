<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(TypeSeeder::class);

        $this->call(ItemTypeSeeder::class);

        $this->call(AtaqueTypeSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ItemsSeeder::class);

        $this->call(UserHasItemSeeder::class);
    }
}
