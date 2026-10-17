<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['Admin Akademik', 'admin@penilaian.test', 'admin'],
            ['Dosen Pengampu', 'dosen@penilaian.test', 'dosen'],
            ['Andi Saputra', 'mahasiswa@penilaian.test', 'mahasiswa'],
        ];

        foreach ($data as $item) {
            User::create([
                'name' => $item[0],
                'email' => $item[1],
                'password' => Hash::make('password'),
                'role' => $item[2],
            ]);
        }
    }
}