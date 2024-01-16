<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id_kecamatan_user' => 1,
                'email' => 'superadmin@gmail.com',
                'name' => 'superadmin',
                'password' => Hash::make('password'),
                'role' => 'superadmin',
                'tempat_lahir' => 'surabaya',
                'tgl_lahir' => '2000-01-01'
            ],
            [
                'id_kecamatan_user' => 1,
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'tempat_lahir' => 'surabaya',
                'tgl_lahir' => '2000-01-01'
            ], [
                'id_kecamatan_user' => 1,
                'email' => 'adminppob@gmail.com',
                'name' => 'adminppob',
                'password' => Hash::make('password'),
                'role' => 'adminppob',
                'tempat_lahir' => 'surabaya',
                'tgl_lahir' => '2000-01-01'
            ],

        ]);
    }
}
