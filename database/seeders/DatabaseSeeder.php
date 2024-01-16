<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(userSeeder::class);
        $this->call(kotaSeeder::class);
        $this->call(kecamatanSeeder::class);
        $this->call(customerSeeder::class);
        $this->call(transaksiSeeder::class);
        $this->call(sosmedSeeder::class);
        $this->call(challengeSeeder::class);
        $this->call(elearningSeeder::class);
    }
}
