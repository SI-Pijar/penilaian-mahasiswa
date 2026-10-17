@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card">
<div class="card-body p-4">
<h1 class="h4 judul-halaman mb-1"><i class="bi bi-pencil-square text-primary
me-2"></i>Edit Nilai</h1>
<p class="text-muted mb-4">Nilai akhir akan dihitung ulang setelah disimpan.</p>
<div class="row g-3 mb-4">
<div class="col-md-6">
<div class="p-3 rounded bg-light h-100">
<div class="small text-muted">Mahasiswa</div>
<div class="fw-semibold">{{ $nilai->mahasiswa->npm }} - {{
$nilai->mahasiswa->nama }}</div>
</div>
</div>
<div class="col-md-6">
<div class="p-3 rounded bg-light h-100">
<div class="small text-muted">Mata Kuliah</div>
<div class="fw-semibold">{{ $nilai->mataKuliah->kode_mk }} - {{
$nilai->mataKuliah->nama_mk }}</div>
</div>
</div>
</div>
<form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
@csrf
@method('PUT')
<div class="row">
<div class="col-6 col-md-3 mb-3">
<label for="kehadiran" class="form-label">Kehadiran (10%)</label>
<input type="number" step="0.01" class="form-control
@error('kehadiran') is-invalid @enderror" id="kehadiran" name="kehadiran" value="{{
old('kehadiran', (float) $nilai->kehadiran) }}">
@error('kehadiran')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="col-6 col-md-3 mb-3">
<label for="tugas" class="form-label">Tugas (20%)</label>
<input type="number" step="0.01" class="form-control @error('tugas')
is-invalid @enderror" id="tugas" name="tugas" value="{{ old('tugas', (float) $nilai->tugas) }}">
@error('tugas')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="col-6 col-md-3 mb-3">
<label for="uts" class="form-label">UTS (30%)</label>
<input type="number" step="0.01" class="form-control @error('uts')
is-invalid @enderror" id="uts" name="uts" value="{{ old('uts', (float) $nilai->uts) }}">
@error('uts')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="col-6 col-md-3 mb-3">
<label for="uas" class="form-label">UAS (40%)</label>
<input type="number" step="0.01" class="form-control @error('uas')
is-invalid @enderror" id="uas" name="uas" value="{{ old('uas', (float) $nilai->uas) }}">
@error('uas')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="d-flex gap-2 mt-2">
<button type="submit" class="btn btn-primary"><i class="bi bi-save
me-1"></i>Simpan Perubahan</button>
<a href="{{ route('nilai.index') }}" class="btn btn-light">Batal</a>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
