<?php

namespace Database\Seeders;

use App\Models\challenges;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class challengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        challenges::insert([
            [
                'judul' => "challenge 1",
                'deskripsi' => "desk challenge 1",
                'image' => 'image',
                'hari' => 'senin',
            ],
            [
                'judul' => "chanllegen 2",
                'deskripsi' => "desk challenge 2",
                'image' => 'image',
                'hari' => 'selasa',
            ],
            [
                'judul' => "chanllegen 3",
                'deskripsi' => "desk challenge 3",
                'image' => 'image',
                'hari' => 'rabu',
            ],
            [
                'judul' => "chanllegen 4",
                'deskripsi' => "desk challenge 4",
                'image' => 'image',
                'hari' => 'kamis',
            ],
            [
                'judul' => "chanllegen 5",
                'deskripsi' => "desk challenge 5",
                'image' => 'image',
                'hari' => 'jumat',
            ],
        ]);
    }
}
