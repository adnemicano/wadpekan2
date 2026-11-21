<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Modul Ruang & Fasilitas')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Scrollbar selalu tampil supaya layout tidak bergeser antar halaman */
        html {
            overflow-y: scroll;
        }

        /* Penanda halaman aktif tanpa mengubah lebar teks */
        .navbar .nav-link {
            border-bottom: 2px solid transparent;
        }

        .navbar .nav-link.active {
            border-bottom-color: #fff;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">

            <a class="navbar-brand fw-semibold" href="{{ route('ruang.daftar') }}">
                Modul Ruang
            </a>

            <div class="ms-auto d-flex align-items-center gap-3">

                @can('tambah-ruang')
                    <a href="{{ route('home') }}"
                        class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}"
                        @if (request()->routeIs('home')) aria-current="page" @endif>
                        Beranda
                    </a>
                @endcan

                <a href="{{ route('ruang.daftar') }}"
                    class="nav-link text-white {{ request()->routeIs('ruang.daftar') ? 'active' : '' }}"
                    @if (request()->routeIs('ruang.daftar')) aria-current="page" @endif>
                    Daftar Ruang
                </a>

                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                        Login
                    </a>
                @endif

            </div>
        </div>
    </nav>

    <!-- Isi halaman (container sama di semua halaman) -->
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>