<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public $nilaiModel;
    public $mahasiswaModel;
    public $mataKuliahModel;

    public function __construct()
    {
        $this->nilaiModel = new Nilai();
        $this->mahasiswaModel = new Mahasiswa();
        $this->mataKuliahModel = new MataKuliah();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Nilai',
            'nilai' => $this->nilaiModel->getNilai(),
        ];

        return view('list_nilai', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Input Nilai',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa(),
            'mks' => $this->mataKuliahModel->getAllMK(),
        ];

        return view('create_nilai', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'bail|required|uuid|exists:mahasiswa,id',
            'mata_kuliah_id' => 'bail|required|uuid|exists:mata_kuliah,id',
            'kehadiran' => 'required|numeric|between:0,100',
            'tugas' => 'required|numeric|between:0,100',
            'uts' => 'required|numeric|between:0,100',
            'uas' => 'required|numeric|between:0,100',
        ]);

        $sudahAda = $this->nilaiModel
            ->where('mahasiswa_id', $request->input('mahasiswa_id'))
            ->where('mata_kuliah_id', $request->input('mata_kuliah_id'))
            ->exists();

        if ($sudahAda) {
            return back()->withErrors(['mata_kuliah_id' => 'Mahasiswa ini sudah punya nilai di mata kuliah tersebut. Ubah nilainya lewat tombol Edit.'])->withInput();
        }

        $hasil = $this->nilaiModel->hitungNilaiAkhir(
            $request->input('kehadiran'),
            $request->input('tugas'),
            $request->input('uts'),
            $request->input('uas')
        );

        $this->nilaiModel->create([
            'mahasiswa_id' => $request->input('mahasiswa_id'),
            'mata_kuliah_id' => $request->input('mata_kuliah_id'),
            'kehadiran' => $request->input('kehadiran'),
            'tugas' => $request->input('tugas'),
            'uts' => $request->input('uts'),
            'uas' => $request->input('uas'),
            'nilai_akhir' => $hasil['nilai_akhir'],
            'huruf' => $hasil['huruf'],
            'bobot' => $hasil['bobot'],
        ]);

        return redirect()->to('/nilai')->with('success', 'Nilai berhasil disimpan dengan nilai akhir ' . $hasil['nilai_akhir'] . ' (' . $hasil['huruf'] . ').');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Nilai',
            'nilai' => $this->nilaiModel->with(['mahasiswa', 'mataKuliah'])->findOrFail($id),
        ];

        return view('edit_nilai', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kehadiran' => 'required|numeric|between:0,100',
            'tugas' => 'required|numeric|between:0,100',
            'uts' => 'required|numeric|between:0,100',
            'uas' => 'required|numeric|between:0,100',
        ]);

        $nilai = $this->nilaiModel->findOrFail($id);

        $hasil = $this->nilaiModel->hitungNilaiAkhir(
            $request->input('kehadiran'),
            $request->input('tugas'),
            $request->input('uts'),
            $request->input('uas')
        );

        $nilai->update([
            'kehadiran' => $request->input('kehadiran'),
            'tugas' => $request->input('tugas'),
            'uts' => $request->input('uts'),
            'uas' => $request->input('uas'),
            'nilai_akhir' => $hasil['nilai_akhir'],
            'huruf' => $hasil['huruf'],
            'bobot' => $hasil['bobot'],
        ]);

        return redirect()->to('/nilai')->with('success', 'Nilai berhasil diperbarui menjadi ' . $hasil['nilai_akhir'] . ' (' . $hasil['huruf'] . ').');
    }

    public function destroy($id)
    {
        $nilai = $this->nilaiModel->findOrFail($id);
        $nilai->delete();

        return redirect()->to('/nilai')->with('success', 'Nilai berhasil dihapus!');
    }
}
