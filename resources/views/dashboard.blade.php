@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h1 class="h4 judul-halaman mb-1">Halo, {{ $user->name }}</h1>
            <p class="text-muted mb-0">Kamu masuk sebagai <span class="badge text-bg-primary">{{ ucfirst($user->role) }}</span></p>
        </div>
        <div class="text-muted small"><i class="bi bi-calendar3 me-1"></i>{{ date('d-m-Y') }}</div>
    </div>
</div>

@if ($user->role == 'mahasiswa')
    @if ($ringkasan)
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="ikon bg-primary-subtle text-primary"><i class="bi bi-award-fill"></i></div>
                        <div>
                            <div class="text-muted small">IPK</div>
                            <div class="fs-3 fw-bold">{{ number_format($ringkasan['ipk'], 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="ikon bg-success-subtle text-success"><i class="bi bi-stack"></i></div>
                        <div>
                            <div class="text-muted small">Total SKS</div>
                            <div class="fs-3 fw-bold">{{ $ringkasan['total_sks'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="ikon bg-warning-subtle text-warning"><i class="bi bi-journal-check"></i></div>
                        <div>
                            <div class="text-muted small">Mata Kuliah Dinilai</div>
                            <div class="fs-3 fw-bold">{{ $ringkasan['jumlah_mk'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('khs.index') }}" class="btn btn-primary"><i class="bi bi-file-earmark-text me-1"></i>Lihat Kartu Hasil Studi</a>
    @else
        <div class="alert alert-warning">
            <i class="bi bi-exclamation-circle me-1"></i>Akun kamu belum terhubung dengan data mahasiswa. Hubungi admin akademik.
        </div>
    @endif
@else
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="ikon bg-primary-subtle text-primary"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <div class="text-muted small">Mahasiswa</div>
                        <div class="fs-3 fw-bold">{{ $jumlahMahasiswa }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="ikon bg-success-subtle text-success"><i class="bi bi-journal-bookmark-fill"></i></div>
                    <div>
                        <div class="text-muted small">Mata Kuliah</div>
                        <div class="fs-3 fw-bold">{{ $jumlahMataKuliah }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="ikon bg-warning-subtle text-warning"><i class="bi bi-clipboard-data-fill"></i></div>
                    <div>
                        <div class="text-muted small">Nilai Tercatat</div>
                        <div class="fs-3 fw-bold">{{ $jumlahNilai }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($user->role == 'admin')
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary me-2 mb-2"><i class="bi bi-person-plus me-1"></i>Tambah Mahasiswa</a>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-outline-primary mb-2"><i class="bi bi-journal-plus me-1"></i>Tambah Mata Kuliah</a>
    @else
        <a href="{{ route('nilai.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-circle me-1"></i>Input Nilai</a>
    @endif
@endif
@endsection