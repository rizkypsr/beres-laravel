<?php

namespace Database\Seeders;

use App\Models\kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kecamatan::insert([
            'id_kecamatan'=>1,
            'id_kota_kecamatan'=>1,
            'nama_kecamatan'=>'KedungKandang',
            
        ]);
    }
}
