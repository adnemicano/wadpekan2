<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Ruang Sidang</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Modul Ruang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('/')]) href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('daftar-ruang')])
                       href="{{ url('/daftar-ruang') }}">Daftar Ruang</a>
                </li>
                @auth
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">Logout ({{ Auth::user()->username }})</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('login')])
                       href="{{ url('/login') }}">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<section id="form-ruang" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Formulir Tambah Ruang Sidang</h2>

                    <form action="{{ route('ruang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_ruang" class="form-label fw-semibold">Kode Ruang</label>
                            <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_ruang" class="form-label fw-semibold">Nama Ruang</label>
                            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_gedung" class="form-label fw-semibold">Nomor / Nama Gedung</label>
                            <input type="text" class="form-control" id="no_gedung" name="no_gedung" required>
                        </div>

                        <div class="mb-3">
                            <label for="kapasitas" class="form-label fw-semibold">Kapasitas (Orang)</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Fasilitas Ruangan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="proyektor" name="proyektor" value="1">
                                <label class="form-check-label" for="proyektor">Proyektor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="pc" name="pc" value="1">
                                <label class="form-check-label" for="pc">PC / Komputer</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Kirim Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>