<?php

namespace Database\Seeders;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelasA = Kelas::where('nama_kelas', 'A')->first();
        $kelasB = Kelas::where('nama_kelas', 'B')->first();
        $akunMahasiswa = User::where('email', 'mahasiswa@penilaian.test')->first();
        $data = [
            ['2417051001', 'Andi Saputra', $kelasA->id, 2024, $akunMahasiswa->id],
            ['2417051002', 'Bunga Lestari', $kelasA->id, 2024, null],
            ['2417051003', 'Citra Ramadhani', $kelasB->id, 2024, null],
            ['2317051004', 'Dimas Prakoso', $kelasB->id, 2023, null],
            ['2317051005', 'Eka Wulandari', $kelasA->id, 2023, null],
        ];
        foreach ($data as $item) {
            Mahasiswa::create([
                'npm' => $item[0],
                'nama' => $item[1],
                'kelas_id' => $item[2],
                'angkatan' => $item[3],
                'user_id' => $item[4],
            ]);
        }
    }
}
