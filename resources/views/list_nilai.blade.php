@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2
mb-3">
<div>
<h1 class="h4 judul-halaman mb-0">Data Nilai Mahasiswa</h1>
<p class="text-muted mb-0">Bobot: Kehadiran 10%, Tugas 20%, UTS 30%, UAS 40%</p>
</div>
<a href="{{ route('nilai.create') }}" class="btn btn-primary">
<i class="bi bi-plus-circle me-1"></i>Input Nilai
</a>
</div>
<div class="card">
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead>
<tr>
<th class="ps-4">No</th>
<th>Mahasiswa</th>
<th>Mata Kuliah</th>
<th>Hadir</th>
<th>Tugas</th>
<th>UTS</th>
<th>UAS</th>
<th>Akhir</th>
<th>Huruf</th>
<th class="text-end pe-4">Aksi</th>
</tr>
</thead>
<tbody>
@forelse ($nilai as $item)
<tr>
<td class="ps-4">{{ $loop->iteration }}</td>
<td>
<div class="fw-semibold">{{ $item->nama }}</div>
<div class="small text-muted">{{ $item->npm }}</div>
</td>
<td>
<div class="fw-semibold">{{ $item->nama_mk }}</div>
<div class="small text-muted">{{ $item->kode_mk }} &middot; {{
$item->sks }} SKS</div>
</td>
<td>{{ (float) $item->kehadiran }}</td>
<td>{{ (float) $item->tugas }}</td>
<td>{{ (float) $item->uts }}</td>
<td>{{ (float) $item->uas }}</td>
<td class="fw-bold">{{ $item->nilai_akhir }}</td>
<td><span class="badge text-bg-{{ $item->warnaHuruf() }} px-3">{{
$item->huruf }}</span></td>
<td class="text-end pe-4 text-nowrap">
<a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-sm
btn-outline-primary">
<i class="bi bi-pencil-square"></i> Edit
</a>
<form action="{{ route('nilai.destroy', $item->id) }}"
method="POST" class="d-inline">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-outline-danger"
onclick="return confirm('Hapus nilai {{ $item->nama }} untuk {{ $item->nama_mk }}?')">
<i class="bi bi-trash3"></i> Hapus
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="10" class="text-center text-muted py-5">Belum ada nilai
yang diinput.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
@endsection
