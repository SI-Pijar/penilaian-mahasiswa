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
            background-color: #f3f6fb;
        }
        .navbar-utama {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
        }
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
        }
        .card-stat .ikon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .table thead th {
            background-color: #eef2ff;
            color: #1e3a8a;
            font-weight: 600;
            white-space: nowrap;
        }
        .judul-halaman {
            font-weight: 700;
            color: #0f172a;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.navbar')

    <main class="container py-4 flex-grow-1">
        @include('components.alert')
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
