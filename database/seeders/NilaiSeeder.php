<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    public function run(): void
    {
        $nilaiModel = new Nilai();

        $data = [
            ['2417051001', 'SI201', 100, 85, 80, 88],
            ['2417051001', 'SI202', 90, 78, 72, 75],
            ['2417051001', 'SI301', 100, 90, 86, 92],
            ['2417051002', 'SI201', 85, 70, 65, 60],
            ['2417051003', 'SI301', 95, 80, 77, 81],
        ];

        foreach ($data as $item) {
            $mahasiswa = Mahasiswa::where('npm', $item[0])->first();
            $mataKuliah = MataKuliah::where('kode_mk', $item[1])->first();
            $hasil = $nilaiModel->hitungNilaiAkhir($item[2], $item[3], $item[4], $item[5]);

            Nilai::create([
                'mahasiswa_id' => $mahasiswa->id,
                'mata_kuliah_id' => $mataKuliah->id,
                'kehadiran' => $item[2],
                'tugas' => $item[3],
                'uts' => $item[4],
                'uas' => $item[5],
                'nilai_akhir' => $hasil['nilai_akhir'],
                'huruf' => $hasil['huruf'],
                'bobot' => $hasil['bobot'],
            ]);
        }
    }
}
