<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public $mahasiswaModel;
    public $kelasModel;

    public function __construct()
    {
        $this->mahasiswaModel = new Mahasiswa();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa(),
        ];

        return view('list_mahasiswa', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mahasiswa',
            'kelas' => $this->kelasModel->getKelas(),
        ];

        return view('create_mahasiswa', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|digits:10|unique:mahasiswa,npm',
            'nama' => 'required|string|max:100',
            'kelas_id' => 'bail|required|integer|exists:kelas,id',
            'angkatan' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $this->mahasiswaModel->create([
            'npm' => $request->input('npm'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'angkatan' => $request->input('angkatan'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Mahasiswa',
            'mhs' => $this->mahasiswaModel->findOrFail($id),
            'kelas' => $this->kelasModel->getKelas(),
        ];

        return view('edit_mahasiswa', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required|digits:10|unique:mahasiswa,npm,' . $id,
            'nama' => 'required|string|max:100',
            'kelas_id' => 'bail|required|integer|exists:kelas,id',
            'angkatan' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $mhs = $this->mahasiswaModel->findOrFail($id);
        $mhs->update([
            'npm' => $request->input('npm'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'angkatan' => $request->input('angkatan'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mhs = $this->mahasiswaModel->findOrFail($id);
        $mhs->delete();

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
