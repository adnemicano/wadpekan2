<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Topik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2>Edit Data Topik dan Bidang Minat</h2>
        
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

        <form method="POST" action="{{ route('topik.update', $topik->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rumpunilmuTextInput" class="form-label">Rumpun Ilmu</label>
                <input type="text" name="Rumpun_Ilmu" id="rumpunilmuTextInput" class="form-control" value="{{ old('Rumpun_Ilmu', $topik->Rumpun_Ilmu) }}" required>
            </div>

            <div class="mb-3">
                <label for="topikrisetTextInput" class="form-label">Pengelolaan Topik Riset</label>
                <input type="text" name="Pengelolaan_Taksonomi_Topik_Riset" id="topikrisetTextInput" class="form-control" value="{{ old('Pengelolaan_Taksonomi_Topik_Riset', $topik->Pengelolaan_Taksonomi_Topik_Riset) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsifokusTextInput" class="form-label">Deskripsi Fokus</label>
                <input type="text" name="Deskripsi_Fokus" id="deskripsifokusTextInput" class="form-control" value="{{ old('Deskripsi_Fokus', $topik->Deskripsi_Fokus) }}" required>
            </div>

            <div class="mb-3">
                <label for="katakunciTextInput" class="form-label">Kata Kunci Penelitian</label>
                <input type="text" name="Kata_Kunci_Penelitian" id="katakunciTextInput" class="form-control" value="{{ old('Kata_Kunci_Penelitian', $topik->Kata_Kunci_Penelitian) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('topik.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>