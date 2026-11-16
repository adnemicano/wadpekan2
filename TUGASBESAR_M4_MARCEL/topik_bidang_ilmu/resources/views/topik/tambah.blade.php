<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Topik</title>
    <!-- CDN Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .form-container {
            max-width: 100%;
            padding: 40px 50px;
        }
        .form-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 400;
            color: #333333;
            margin-bottom: 8px;
            font-size: 1rem;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }
        .btn-custom-submit {
            background-color: #0d6efd;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-custom-cancel {
            background-color: #6c757d;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
        }
        .btn-custom-cancel:hover {
            color: #ffffff;
            background-color: #5c636a;
        }
    </style>
</head>
<body>
    <div class="container-fluid form-container">
        <h1 class="form-title">Tambah Data Topik dan Bidang Minat</h1>
        
        {{-- Menampilkan pesan error validasi jika ada input yang kosong --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('topik.store') }}">
            @csrf

            <div class="mb-3">
                <label for="Rumpun_Ilmu" class="form-label">Rumpun Ilmu</label>
                <input type="text" name="Rumpun_Ilmu" id="Rumpun_Ilmu" class="form-control" value="{{ old('Rumpun_Ilmu') }}" required>
            </div>

            <div class="mb-3">
                <label for="Pengelolaan_Taksonomi_Topik_Riset" class="form-label">Pengelolaan Topik Riset</label>
                <input type="text" name="Pengelolaan_Taksonomi_Topik_Riset" id="Pengelolaan_Taksonomi_Topik_Riset" class="form-control" value="{{ old('Pengelolaan_Taksonomi_Topik_Riset') }}" required>
            </div>

            <div class="mb-3">
                <label for="Deskripsi_Fokus" class="form-label">Deskripsi Fokus</label>
                <input type="text" name="Deskripsi_Fokus" id="Deskripsi_Fokus" class="form-control" value="{{ old('Deskripsi_Fokus') }}" required>
            </div>

            <div class="mb-4">
                <label for="Kata_Kunci_Penelitian" class="form-label">Kata Kunci Penelitian</label>
                <input type="text" name="Kata_Kunci_Penelitian" id="Kata_Kunci_Penelitian" class="form-control" value="{{ old('Kata_Kunci_Penelitian') }}" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-custom-submit">Simpan</button>
                <a href="{{ route('topik.index') }}" class="btn btn-custom-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>