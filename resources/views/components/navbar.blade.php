<nav class="navbar navbar-expand-lg navbar-dark navbar-utama shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="bi bi-mortarboard-fill me-1"></i> Penilaian Mahasiswa
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">
                            <i class="bi bi-people-fill me-1"></i>Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}" href="{{ route('matakuliah.index') }}">
                            <i class="bi bi-journal-bookmark-fill me-1"></i>Mata Kuliah
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'dosen')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nilai.*') ? 'active' : '' }}" href="{{ route('nilai.index') }}">
                            <i class="bi bi-clipboard-data-fill me-1"></i>Nilai
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'mahasiswa')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('khs.*') ? 'active' : '' }}" href="{{ route('khs.index') }}">
                            <i class="bi bi-file-earmark-text-fill me-1"></i>KHS
                        </a>
                    </li>
                @endif
            </ul>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><span class="dropdown-item-text small text-muted">Masuk sebagai {{ ucfirst(auth()->user()->role) }}</span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-1"></i>Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
