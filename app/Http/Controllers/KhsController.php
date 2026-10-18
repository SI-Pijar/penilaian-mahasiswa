<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class KhsController extends Controller
{
    public $mahasiswaModel;
    public $nilaiModel;

    public function __construct()
    {
        $this->mahasiswaModel = new Mahasiswa();
        $this->nilaiModel = new Nilai();
    }

    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (! $mahasiswa) {
            return redirect()->route('dashboard')->with('error', 'Akun kamu belum terhubung dengan data mahasiswa. Hubungi admin akademik.');
        }

        $data = [
            'title' => 'Kartu Hasil Studi',
            'mahasiswa' => $mahasiswa,
            'khs' => $this->nilaiModel->getKhs($mahasiswa->id),
            'ringkasan' => $this->mahasiswaModel->hitungIpk($mahasiswa->id),
        ];

        return view('khs', $data);
    }
}
