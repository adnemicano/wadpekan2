<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rumpun_ilmu     = $_POST['rumpun_ilmu'] ?? '';
    $topik_riset     = $_POST['topik_riset'] ?? '';
    $deskripsi_fokus = $_POST['deskripsi_fokus'] ?? '';
    $kata_kunci      = $_POST['kata_kunci'] ?? '';

    if (!empty($rumpun_ilmu) && !empty($topik_riset)) {
        $sql = "INSERT INTO topik_bidang_ilmu (Rumpun_Ilmu, Pengelolaan_Taksonomi_Topik_Riset, Deskripsi_Fokus, Kata_Kunci_Penelitian) 
                VALUES ('$rumpun_ilmu', '$topik_riset', '$deskripsi_fokus', '$kata_kunci')";

        if (mysqli_query($koneksi, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
} 
?> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Topik</title>
    <!-- CDN Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Background abu-abu muda terang sesuai gambar */
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .form-container {
            max-width: 100%;
            padding: 40px 50px;
        }
        .form-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 400;
            color: #333333;
            margin-bottom: 8px;
            font-size: 1rem;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }
        .btn-custom-submit {
            background-color: #0d6efd;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-custom-cancel {
            background-color: #6c757d;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            color: #ffffff;
        }
        .btn-custom-cancel:hover {
            color: #ffffff;
            background-color: #5c636a;
        }
    </style>
</head>
<body>
    <div class="container-fluid form-container">
        <h1 class="form-title">Tambah Data Topik dan Bidang Minat</h1>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="rumpun_ilmu" class="form-label">Rumpun Ilmu</label>
                <input type="text" name="rumpun_ilmu" id="rumpun_ilmu" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="topik_riset" class="form-label">Pengelolaan Topik Riset</label>
                <input type="text" name="topik_riset" id="topik_riset" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi_fokus" class="form-label">Deskripsi Fokus</label>
                <input type="text" name="deskripsi_fokus" id="deskripsi_fokus" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="kata_kunci" class="form-label">Kata Kunci Penelitian</label>
                <input type="text" name="kata_kunci" id="kata_kunci" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-custom-submit">Simpan</button>
                <a href="index.php" class="btn btn-custom-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>