<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sosmed;

class sosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sosmed::insert([
         [   
            'id_sosmed'=>1,
            'nama_sosmed'=>'whatsapp',
            'deskripsi_sosmed' => 628842424823 ,
        ],[
            'id_sosmed'=>2,
            'nama_sosmed'=>'telegram',
            'deskripsi_sosmed' => 't.me/halahla' ,
        ]
        ]);   
     }
}
