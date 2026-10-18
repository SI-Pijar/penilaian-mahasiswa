<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
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

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'mahasiswa_id');
    }

    public function getMahasiswa()
    {
        return $this->join('kelas', 'kelas.id', '=', 'mahasiswa.kelas_id')
            ->select('mahasiswa.*', 'kelas.nama_kelas as nama_kelas')
            ->orderBy('mahasiswa.npm')
 ->get();
    }

    public function hitungIpk($mahasiswaId)
    {
        $daftarNilai = Nilai::join('mata_kuliah', 'mata_kuliah.id', '=', 'nilai.mata_kuliah_id')
            ->where('nilai.mahasiswa_id', $mahasiswaId)
            ->select('nilai.bobot', 'mata_kuliah.sks')
            ->get();

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($daftarNilai as $item) {
            $totalSks += $item->sks;
            $totalBobot += $item->bobot * $item->sks;
        }

        return [
            'jumlah_mk' => $daftarNilai->count(),
            'total_sks' => $totalSks,
            'ipk' => $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0,
        ];
    }
}
