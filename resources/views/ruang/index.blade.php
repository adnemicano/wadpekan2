@extends('layouts.app')

@section('title', 'Tambah Ruang & Fasilitas')

@section('content')
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-1 text-center">Modul Ruang & Fasilitas</h1>
        <p class="text-muted text-center">Tambah Data Ruang</p>
    </div>

    <div class="bg-white p-4 border rounded-1">
        <form action="{{ route('ruang.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="no_gedung" class="form-label">No Gedung</label>
                <input type="text" class="form-control" id="no_gedung" name="no_gedung" required>
            </div>

            <div class="mb-3">
                <label for="kode_ruang" class="form-label">Kode Ruang</label>
                <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
            </div>

            <div class="mb-3">
                <label for="nama_ruang" class="form-label">Nama Ruang</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Fasilitas</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="proyektor" name="proyektor" value="Proyektor">
                    <label class="form-check-label" for="proyektor">Proyektor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="pc" name="pc" value="PC">
                    <label class="form-check-label" for="pc">PC</label>
                </div>
            </div>

            <div class="mb-4">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('ruang.daftar') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection