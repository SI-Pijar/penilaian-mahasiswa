<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'A',
            'B',
            'C',
            'D',
        ];

        foreach ($data as $kelas) {
            Kelas::create([
                'nama_kelas' => $kelas,
            ]);
        }
    }
}