<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>403 - Akses Ditolak</title>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<div class="card shadow-sm p-4 text-center" style="max-width: 450px;">
    <h1 class="display-4 fw-bold text-danger">403</h1>
    <p class="mb-4">
        {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}
    </p>
    <a href="{{ route('ruang.daftar') }}" class="btn btn-primary">Kembali</a>
</div>

</body>
</html>