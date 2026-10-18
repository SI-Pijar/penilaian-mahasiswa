@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
    <div>
        <h1 class="h4 judul-halaman mb-0">Data Mahasiswa</h1>
        <p class="text-muted mb-0">Total {{ count($mahasiswa) }} mahasiswa terdaftar</p>
    </div>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus-fill me-1"></i>Tambah Mahasiswa
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">No</th>
                        <th>NPM</th>
                        <th>Nama</th>
<th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Akun</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $mhs)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $mhs->npm }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->nama_kelas }}</td>
                            <td>{{ $mhs->angkatan }}</td>
                            <td>
                                @if ($mhs->user_id)
                                    <span class="badge text-bg-success">Sudah daftar</span>
                                @else
                                    <span class="badge text-bg-secondary">Belum daftar</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus mahasiswa {{ $mhs->nama }}? Semua nilainya juga akan ikut terhapus.')">
                                        <i class="bi bi-trash3"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
