<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruang Sidang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm p-4">
                <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Ruangan</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                @php
                    $fasilitas_tersimpan = explode(', ', $ruang->fasilitas ?? '');
                @endphp

                <form action="{{ route('ruang.update', $ruang) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kode Ruang</label>
                        <input type="text" class="form-control" name="kode_ruang"
                               value="{{ old('kode_ruang', $ruang->kode_ruang) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Ruang</label>
                        <input type="text" class="form-control" name="nama_ruang"
                               value="{{ old('nama_ruang', $ruang->nama_ruang) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor / Nama Gedung</label>
                        <input type="text" class="form-control" name="no_gedung"
                               value="{{ old('no_gedung', $ruang->no_gedung) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kapasitas (Orang)</label>
                        <input type="number" class="form-control" name="kapasitas" min="1"
                               value="{{ old('kapasitas', $ruang->kapasitas) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Fasilitas Ruangan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="proyektor" name="proyektor" value="1"
                                   @checked(in_array('Proyektor', $fasilitas_tersimpan))>
                            <label class="form-check-label" for="proyektor">Proyektor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="pc" name="pc" value="1"
                                   @checked(in_array('PC', $fasilitas_tersimpan))>
                            <label class="form-check-label" for="pc">PC / Komputer</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('ruang.daftar') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>