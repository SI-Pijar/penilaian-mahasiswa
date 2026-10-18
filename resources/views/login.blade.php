@extends('layouts.auth')

@section('content')
<div class="card kartu-auth">
    <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4">
            <div class="logo-auth mb-3"><i class="bi bi-mortarboard-fill"></i></div>
            <h1 class="h4 fw-bold mb-1">Penilaian Mahasiswa</h1>
            <p class="text-muted mb-0">Masuk untuk melanjutkan</p>
        </div>
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="nama@contoh.com" autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan kata sandi">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="ingat" name="ingat" value="1">
                <label class="form-check-label" for="ingat">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
            </button>
        </form>
        <p class="text-center small text-muted mt-4 mb-0">
            Mahasiswa belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>
</div>
@endsectio
