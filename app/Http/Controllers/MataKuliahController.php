<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public $mataKuliahModel;

    public function __construct()
    {
        $this->mataKuliahModel = new MataKuliah();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Mata Kuliah',
            'mks' => $this->mataKuliahModel->getAllMK(),
        ];

        return view('list_mk', $data);
    }

    public function create()
    {
        return view('create_mk', ['title' => 'Tambah Mata Kuliah']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:mata_kuliah,kode_mk',
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $this->mataKuliahModel->create([
            'kode_mk' => $request->input('kode_mk'),
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        return redirect()->to('/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mk = $this->mataKuliahModel->findOrFail($id);

        return view('edit_mk', ['title' => 'Edit Mata Kuliah', 'mk' => $mk]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:mata_kuliah,kode_mk,' . $id,
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $mk = $this->mataKuliahModel->findOrFail($id);
        $mk->update([
            'kode_mk' => $request->input('kode_mk'),
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        return redirect()->to('/matakuliah')->with('success', 'Mata kuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mk = $this->mataKuliahModel->findOrFail($id);
        $mk->delete();

        return redirect()->to('/matakuliah')->with('success', 'Mata kuliah berhasil dihapus!');
    }
}
