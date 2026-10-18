@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
    <div>
        <h1 class="h4 judul-halaman mb-0">Data Mata Kuliah</h1>
        <p class="text-muted mb-0">Total {{ count($mks) }} mata kuliah</p>
    </div>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
        <i class="bi bi-journal-plus me-1"></i>Tambah Mata Kuliah
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mks as $mk)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td><span class="badge text-bg-light border">{{ $mk->kode_mk }}</span></td>
                            <td class="fw-semibold">{{ $mk->nama_mk }}</td>
                            <td>{{ $mk->sks }} SKS</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus mata kuliah {{ $mk->nama_mk }}? Semua nilai pada mata kuliah ini juga akan ikut terhapus.')">
                                        <i class="bi bi-trash3"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">Belum ada data mata kuliah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
