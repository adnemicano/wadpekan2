<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topik dan Bidang Minat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .main-container {
            padding: 40px 50px;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 25px;
        }
        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            overflow: hidden;
        }
        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }
        .table thead th {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: 600;
            text-transform: capitalize;
            padding: 16px;
            border-bottom: 2px solid #e2e8f0;
        }
        .table tbody td {
            padding: 16px;
            color: #1e293b;
        }
        .btn-add {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            text-decoration: none;
        }
        .btn-add:hover { background-color: #0b5ed7; color: #fff; }
        .btn-edit {
            background-color: #ffc107;
            color: #000;
            border-radius: 6px;
            font-weight: 500;
            padding: 6px 14px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border-radius: 6px;
            font-weight: 500;
            padding: 6px 14px;
        }
        .btn-edit:hover { background-color: #e0a800; color: #000; }
        .btn-delete:hover { background-color: #bb2d3b; color: #fff; }
        .table-bordered th, 
        .table-bordered td {
            border-color: #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="container-fluid main-container">
        <h1 class="page-title">Modul Topik dan Bidang Minat</h1>
        
        {{-- Header & Tombol Login/Logout di Pojok Kanan --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Topik dan Bidang Minat</h2>
            
            <div>
                @auth
                    {{-- Jika sudah login, tampilkan tombol Logout --}}
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @else
                    {{-- Jika belum login, tampilkan tombol Login Admin --}}
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login Admin</a>
                @endauth
            </div>
        </div>

        {{-- Tombol Tambah Topik SELALU MUNCUL di luar --}}
        <div class="mb-4">
            <a href="{{ route('topik.create') }}" class="btn btn-primary btn-add">+ Tambah Topik</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card card-custom">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Rumpun ilmu</th>
                            <th style="width: 25%;">Pengelolaan taksonomi topik riset</th>
                            <th style="width: 30%;">Deskripsi fokus</th>
                            <th style="width: 20%;">Kata kunci penelitian</th>
                            
                            {{-- Kolom Aksi HANYA MUNCUL jika sudah login --}}
                            @auth
                                <th scope="col" class="text-center" style="width: 10%;">Aksi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($topik_bidang_ilmu as $row)
                            <tr>
                                <td class="fw-medium">{{ $row->Rumpun_Ilmu }}</td>
                                <td>{{ $row->Pengelolaan_Taksonomi_Topik_Riset }}</td>
                                <td>{{ $row->Deskripsi_Fokus }}</td>
                                <td>{{ $row->Kata_Kunci_Penelitian }}</td>
                                
                                {{-- Tombol Edit & Hapus HANYA MUNCUL jika sudah login --}}
                                @auth
                                    <td class="text-center">
                                        <a href="{{ route('topik.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                                        <form action="{{ route('topik.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data topik penelitian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>