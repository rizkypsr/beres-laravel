<?php

namespace Database\Seeders;

use App\Models\challenges;
use App\Models\elearning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class elearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        elearning::insert([
            [
                'judul' => "challenge 1",
                'subjudul' => "desk challenge 1",
                'deskripsi' => 'image',
                'link' => 'link',
                'point' => 10,
                'status' => 1,
                'challenge_id' => 1,
                'user_id' => 12000
            ],
        ]);
    }
}
