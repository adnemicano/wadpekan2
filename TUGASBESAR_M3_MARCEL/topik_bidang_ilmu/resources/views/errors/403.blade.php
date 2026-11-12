<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .error-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            padding: 40px;
            text-align: center;
            max-width: 450px;
            width: 100%;
        }
        .error-code {
            font-size: 4rem;
            font-weight: 700;
            color: #dc3545;
            margin-bottom: 10px;
        }
        .error-message {
            color: #475569;
            margin-bottom: 25px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-code">403</div>
        <h3 class="fw-semibold mb-2">Akses Ditolak</h3>
        <p class="error-message">
            {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk melakukan tindakan ini.' }}
        </p>
        <a href="{{ url('/topik') }}" class="btn btn-primary px-4">Kembali ke Beranda</a>
    </div>
</body>
</html>