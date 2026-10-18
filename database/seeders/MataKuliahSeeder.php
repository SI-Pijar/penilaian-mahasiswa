<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['SI201', 'Basis Data', 3],
            ['SI202', 'Pemrograman Berorientasi Objek', 3],
            ['SI301', 'Pemrograman Web Lanjut', 3],
            ['SI302', 'Analisis dan Perancangan Sistem', 3],
            ['SI303', 'Etika Profesi', 2],
        ];

        foreach ($data as $item) {
            MataKuliah::create([
                'kode_mk' => $item[0],
                'nama_mk' => $item[1],
                'sks' => $item[2],
            ]);
        }
    }
}
