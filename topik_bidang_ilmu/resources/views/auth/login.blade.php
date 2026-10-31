<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center py-5" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Login</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-medium">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-medium">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mb-3 fw-medium">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>