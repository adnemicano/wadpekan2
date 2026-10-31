<?php
require_once 'koneksi.php'; 

$query  = "SELECT * FROM topik_bidang_ilmu ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topik dan Bidang Minat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .main-container {
            padding: 40px 50px;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 25px;
        }
        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            overflow: hidden;
        }
        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }
        .table thead th {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: 600;
            text-transform: capitalize;
            padding: 16px;
            border-bottom: 2px solid #e2e8f0;
        }
        .table tbody td {
            padding: 16px;
            color: #1e293b;
        }
        .btn-add {
            background-color: #0d6efd;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #000;
            border-radius: 6px;
            font-weight: 500;
            padding: 6px 14px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border-radius: 6px;
            font-weight: 500;
            padding: 6px 14px;
        }
        .btn-edit:hover { background-color: #e0a800; color: #000; }
        .btn-delete:hover { background-color: #bb2d3b; color: #fff; }
        .table-bordered th, 
        .table-bordered td {
            border-color: #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="container-fluid main-container">
        <h1 class="page-title">Modul Topik dan Bidang Minat</h1>
        
        <div class="mb-4">
            <a href="tambah.php" class="btn btn-primary btn-add">Tambah Topik</a>
        </div>

        <div class="card card-custom">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Rumpun ilmu</th>
                            <th style="width: 25%;">Pengelolaan taksonomi topik riset</th>
                            <th style="width: 30%;">Deskripsi fokus</th>
                            <th style="width: 20%;">Kata kunci penelitian</th>
                            <th style="width: 10%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td class="fw-medium"><?= htmlspecialchars($row['Rumpun_Ilmu']); ?></td>
                                    <td><?= htmlspecialchars($row['Pengelolaan_Taksonomi_Topik_Riset']); ?></td>
                                    <td><?= htmlspecialchars($row['Deskripsi_Fokus']); ?></td>
                                    <td><?= htmlspecialchars($row['Kata_Kunci_Penelitian']); ?></td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column gap-1 align-items-center">
                                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit btn-sm w-100">Edit</a>
                                            <a href="hapus.php?id=<?= $row['id']; ?>" 
                                                class="btn btn-delete btn-sm w-100" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data topik ini?')">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data topik penelitian.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>