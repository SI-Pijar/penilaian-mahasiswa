@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card">
<div class="card-body p-4">
<h1 class="h4 judul-halaman mb-1"><i class="bi bi-clipboard-plus text-primary
me-2"></i>Input Nilai</h1>
<p class="text-muted mb-4">Nilai akhir, huruf, dan bobot dihitung otomatis oleh
sistem.</p>

@if ($errors->any())
<div class="alert alert-danger">
<i class="bi bi-exclamation-triangle-fill me-1"></i>Periksa kembali isian
yang ditandai merah.
</div>
@endif

<form action="{{ route('nilai.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-md-6 mb-3">
<label for="mahasiswa_id" class="form-label">Mahasiswa</label>
<select class="form-select @error('mahasiswa_id') is-invalid @enderror"
id="mahasiswa_id" name="mahasiswa_id">
<option value="">Pilih mahasiswa</option>
@foreach ($mahasiswa as $mhs)
<option value="{{ $mhs->id }}" {{ old('mahasiswa_id') ==
$mhs->id ? 'selected' : '' }}>{{ $mhs->npm }} - {{ $mhs->nama }}</option>
@endforeach
</select>
@error('mahasiswa_id')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

<div class="col-md-6 mb-3">
<label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
<select class="form-select @error('mata_kuliah_id') is-invalid
@enderror" id="mata_kuliah_id" name="mata_kuliah_id">
<option value="">Pilih mata kuliah</option>
@foreach ($mks as $mk)
<option value="{{ $mk->id }}" {{ old('mata_kuliah_id') ==
$mk->id ? 'selected' : '' }}>{{ $mk->kode_mk }} - {{ $mk->nama_mk }}</option>
@endforeach
</select>
@error('mata_kuliah_id')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>

<div class="row">
<div class="col-6 col-md-3 mb-3">
<label for="kehadiran" class="form-label">Kehadiran (10%)</label>
<input type="number" step="0.01" class="form-control
@error('kehadiran') is-invalid @enderror" id="kehadiran" name="kehadiran" value="{{
old('kehadiran') }}" placeholder="0-100">
@error('kehadiran')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

<div class="col-6 col-md-3 mb-3">
<label for="tugas" class="form-label">Tugas (20%)</label>
<input type="number" step="0.01" class="form-control @error('tugas')
is-invalid @enderror" id="tugas" name="tugas" value="{{ old('tugas') }}" placeholder="0-100">
@error('tugas')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

<div class="col-6 col-md-3 mb-3">
<label for="uts" class="form-label">UTS (30%)</label>
<input type="number" step="0.01" class="form-control @error('uts')
is-invalid @enderror" id="uts" name="uts" value="{{ old('uts') }}" placeholder="0-100">
@error('uts')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

<div class="col-6 col-md-3 mb-3">
<label for="uas" class="form-label">UAS (40%)</label>
<input type="number" step="0.01" class="form-control @error('uas')
is-invalid @enderror" id="uas" name="uas" value="{{ old('uas') }}" placeholder="0-100">
@error('uas')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>

<div class="d-flex gap-2 mt-2">
<button type="submit" class="btn btn-primary"><i class="bi bi-save
me-1"></i>Simpan Nilai</button>
<a href="{{ route('nilai.index') }}" class="btn btn-light">Batal</a>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
