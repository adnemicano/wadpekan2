@extends('layouts.app')

@section('title', 'Register - Modul Ruang & Fasilitas')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card border rounded-1 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold text-center mb-1">Register</h1>
                    <p class="text-muted text-center small mb-4">Buat Akun Baru (Role: Petugas)</p>

                    <form action="{{ route('register.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   id="username" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>

                        <p class="text-center small text-muted mb-0">
                            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection