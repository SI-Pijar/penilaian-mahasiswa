<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3a8a, #2563eb 55%, #38bdf8);
        }
        .kartu-auth {
            border: none;
            border-radius: 18px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.25);
        }
        .logo-auth {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background-color: #eef2ff;
            color: #1e3a8a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                @include('components.alert')
                @yield('content')
                <p class="text-center text-white-50 small mt-4 mb-0">Penilaian Mahasiswa &copy; {{ date('Y') }} Team 7 Pemrograman Web Lanjut</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
