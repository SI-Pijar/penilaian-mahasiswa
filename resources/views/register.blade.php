@extends('layouts.auth')

@section('content')
<div class="card kartu-auth">
    <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4">
            <div class="logo-auth mb-3"><i class="bi bi-person-plus-fill"></i></div>
            <h1 class="h4 fw-bold mb-1">Daftar Akun Mahasiswa</h1>
  <p class="text-muted mb-0">Gunakan NPM yang sudah terdaftar di bagian akademik</p>
        </div>

        <form action="{{ route('register.proses') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" value="{{ old('npm') }}" placeholder="Contoh: 2417051001">
                @error('npm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="nama@contoh.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 8 karakter">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ketik ulang kata sandi">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="bi bi-person-check-fill me-1"></i>Daftar
            </button>
        </form>

        <p class="text-center small text-muted mt-4 mb-0">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection
