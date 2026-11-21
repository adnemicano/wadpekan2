@extends('layouts.app')

@section('title', 'Login - Modul Ruang & Fasilitas')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card border rounded-1 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold text-center mb-1">Login</h1>
                    <p class="text-muted text-center small mb-4">Modul Ruang & Fasilitas</p>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   id="username" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>

                        <p class="text-center small text-muted mb-0">
                            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection