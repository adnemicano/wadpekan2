@extends('layouts.app')

@section('title', 'Edit Ruang & Fasilitas')

@section('content')
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-1 text-center">Modul Ruang & Fasilitas</h1>
        <p class="text-muted text-center">Edit Data Ruang</p>
    </div>

    <div class="bg-white p-4 border rounded-1">
        <form action="{{ route('ruang.update', $ruang) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="no_gedung" class="form-label">No Gedung</label>
                <input type="text" class="form-control" id="no_gedung" name="no_gedung"
                       value="{{ old('no_gedung', $ruang->no_gedung) }}"
                       @cannot('updateFull', $ruang) disabled @endcannot required>
            </div>

            <div class="mb-3">
                <label for="kode_ruang" class="form-label">Kode Ruang</label>
                <input type="text" class="form-control" id="kode_ruang" name="kode_ruang"
                       value="{{ old('kode_ruang', $ruang->kode_ruang) }}"
                       @cannot('updateFull', $ruang) disabled @endcannot required>
            </div>

            <div class="mb-3">
                <label for="nama_ruang" class="form-label">Nama Ruang</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang"
                       value="{{ old('nama_ruang', $ruang->nama_ruang) }}"
                       @cannot('updateFull', $ruang) disabled @endcannot required>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Fasilitas</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="proyektor" name="proyektor" value="Proyektor"
                           {{ str_contains($ruang->fasilitas, 'Proyektor') ? 'checked' : '' }}>
                    <label class="form-check-label" for="proyektor">Proyektor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="pc" name="pc" value="PC"
                           {{ str_contains($ruang->fasilitas, 'PC') ? 'checked' : '' }}>
                    <label class="form-check-label" for="pc">PC</label>
                </div>
            </div>

            <div class="mb-4">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                       value="{{ old('kapasitas', $ruang->kapasitas) }}" min="1" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('ruang.daftar') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection