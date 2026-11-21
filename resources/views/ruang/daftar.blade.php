@extends('layouts.app')

@section('title', 'Daftar Ruang & Fasilitas')

@section('content')
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-1 text-center">Modul Ruang & Fasilitas</h1>
        <p class="text-muted text-center">Data Ruang</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-2">
        @can('tambah-ruang')
            <a href="{{ route('home') }}" class="btn btn-primary">Tambah Data</a>
        @endcan
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
                        @can('update', $item)
                            <a href="{{ route('ruang.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan

                        @can('delete', $item)
                            <form action="{{ route('ruang.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @endcan
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection