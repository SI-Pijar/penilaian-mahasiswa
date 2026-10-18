@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
    <div>
        <h1 class="h4 judul-halaman mb-0">Kartu Hasil Studi</h1>
        <p class="text-muted mb-0">Rekap nilai seluruh mata kuliah yang sudah dinilai</p>
    </div>
    <button type="button" class="btn btn-outline-primary" onclick="window.print()">
        <i class="bi bi-printer me-1"></i>Cetak
    </button>
</div>

<div class="card mb-4">
    <div class="card-body p-4">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="text-muted small">Nama</div>
                <div class="fw-semibold">{{ $mahasiswa->nama }}</div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">NPM</div>
                <div class="fw-semibold">{{ $mahasiswa->npm }}</div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">Kelas</div>
                <div class="fw-semibold">{{ $mahasiswa->kelas->nama_kelas }}</div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">Angkatan</div>
                <div class="fw-semibold">{{ $mahasiswa->angkatan }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Akhir</th>
                        <th>Huruf</th>
                        <th>Bobot</th>
                        <th class="pe-4">Bobot x SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($khs as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_mk }}</td>
                            <td class="fw-semibold">{{ $item->nama_mk }}</td>
                            <td>{{ $item->sks }}</td>
                            <td>{{ $item->nilai_akhir }}</td>
                            <td><span class="badge text-bg-{{ $item->warnaHuruf() }} px-3">{{ $item->huruf }}</span></td>
                            <td>{{ $item->bobot }}</td>
                            <td class="pe-4">{{ number_format($item->bobot * $item->sks, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5">Belum ada nilai yang diinput oleh dosen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white d-flex flex-wrap justify-content-end gap-4 py-3 px-4">
        <div>Total SKS: <span class="fw-bold">{{ $ringkasan['total_sks'] }}</span></div>
        <div>IPK: <span class="fw-bold text-primary fs-5">{{ number_format($ringkasan['ipk'], 2) }}</span></div>
    </div>
</div>
@endsection
