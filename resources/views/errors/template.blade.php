<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('kode') | Penilaian Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
rel="stylesheet">
</head>
<body class="d-flex align-items-center min-vh-100" style="background-color: #f3f6fb;">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="card border-0 shadow-sm" style="border-radius: 18px;">
<div class="card-body text-center p-5">
<div class="display-4 text-primary mb-2"><i class="bi
@yield('ikon')"></i></div>
<div class="display-5 fw-bold text-primary">@yield('kode')</div>
<h1 class="h4 fw-bold mt-2">@yield('judul')</h1>
<p class="text-muted">@yield('pesan')</p>
<a href="{{ url('/') }}" class="btn btn-primary mt-2"><i class="bi
bi-house-door me-1"></i>Kembali ke Beranda</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
