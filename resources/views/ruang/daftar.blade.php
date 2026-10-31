<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modul Ruang & Fasilitas</title>
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

<main class="container py-5">
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-1 text-center">Modul Ruang & Fasilitas</h1>
        <p class="text-muted text-center">Data Ruang</p>
    </div>

    <div class="mb-2">
        <a href="{{ url('/') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="table-responsive bg-white p-3 border rounded-1">
        <table class="table table-bordered table-striped align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="text-center" style="width: 5%;">No</th>
                    <th scope="col">No Gedung</th>
                    <th scope="col">Kode Ruang</th>
                    <th scope="col">Nama Ruang</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Kapasitas</th>
                    @auth
                    <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($ruang as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->no_gedung }}</td>
                    <td>{{ $item->kode_ruang }}</td>
                    <td>{{ $item->nama_ruang }}</td>
                    <td>{{ $item->fasilitas }}</td>
                    <td>{{ $item->kapasitas }} Orang</td>
                    @auth
                    <td class="text-center">
                        <a href="{{ route('ruang.edit', $item) }}"
                           class="btn btn-sm btn-warning me-1">Edit</a>
                        <form action="{{ route('ruang.destroy', $item) }}" method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach

                @if ($ruang->isEmpty())
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data ruang yang masuk.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>

</body>
</html>