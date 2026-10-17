<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $mahasiswaModel;
    public $mataKuliahModel;
    public $nilaiModel;

    public function __construct()
    {
        $this->mahasiswaModel = new Mahasiswa();
        $this->mataKuliahModel = new MataKuliah();
        $this->nilaiModel = new Nilai();
    }

    public function index()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'jumlahMahasiswa' => $this->mahasiswaModel->count(),
            'jumlahMataKuliah' => $this->mataKuliahModel->count(),
            'jumlahNilai' => $this->nilaiModel->count(),
            'ringkasan' => null,
        ];

        if ($user->role == 'mahasiswa' && $user->mahasiswa) {
            $data['ringkasan'] = $this->mahasiswaModel->hitungIpk($user->mahasiswa->id);
        }

        return view('dashboard', $data);
    }
}