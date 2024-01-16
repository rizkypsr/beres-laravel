<?php

namespace Database\Seeders;

use App\Models\kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kota::insert([
            'id_kota'=>1,
            'nama_kota'=>'Malang',
            
        ]);
    }
}
