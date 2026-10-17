<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $guarded = ['id'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function getNilai()
    {
        return $this->join('mahasiswa', 'mahasiswa.id', '=', 'nilai.mahasiswa_id')
            ->join('mata_kuliah', 'mata_kuliah.id', '=', 'nilai.mata_kuliah_id')
            ->select('nilai.*', 'mahasiswa.npm', 'mahasiswa.nama', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'mata_kuliah.sks')
            ->orderBy('mahasiswa.npm')
            ->orderBy('mata_kuliah.kode_mk')
            ->get();
    }

    public function getKhs($mahasiswaId)
    {
        return $this->join('mata_kuliah', 'mata_kuliah.id', '=', 'nilai.mata_kuliah_id')
            ->where('nilai.mahasiswa_id', $mahasiswaId)
            ->select('nilai.*', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'mata_kuliah.sks')
            ->orderBy('mata_kuliah.kode_mk')
            ->get();
    }

    public function hitungNilaiAkhir($kehadiran, $tugas, $uts, $uas)
    {
        $nilaiAkhir = ($kehadiran * 0.10) + ($tugas * 0.20) + ($uts * 0.30) + ($uas * 0.40);
        $nilaiAkhir = round($nilaiAkhir, 2);
        $huruf = $this->konversiHuruf($nilaiAkhir);

        return [
            'nilai_akhir' => $nilaiAkhir,
            'huruf' => $huruf,
            'bobot' => $this->konversiBobot($huruf),
        ];
    }

    public function konversiHuruf($nilai)
    {
        if ($nilai >= 85) return 'A';
        if ($nilai >= 80) return 'A-';
        if ($nilai >= 75) return 'B+';
        if ($nilai >= 70) return 'B';
        if ($nilai >= 65) return 'B-';
        if ($nilai >= 60) return 'C+';
        if ($nilai >= 55) return 'C';
        if ($nilai >= 50) return 'D';
        return 'E';
    }

    public function konversiBobot($huruf)
    {
        $daftarBobot = [
            'A' => 4.00,
            'A-' => 3.70,
            'B+' => 3.30,
            'B' => 3.00,
            'B-' => 2.70,
            'C+' => 2.30,
            'C' => 2.00,
            'D' => 1.00,
            'E' => 0.00,
        ];

        return $daftarBobot[$huruf];
    }

    public function warnaHuruf()
    {
        if (in_array($this->huruf, ['A', 'A-'])) return 'success';
        if (in_array($this->huruf, ['B+', 'B', 'B-'])) return 'primary';
        if (in_array($this->huruf, ['C+', 'C'])) return 'warning';
        return 'danger';
    }
}
