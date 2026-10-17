<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_ruang";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSSTugas.css">
    <title>Modul Ruang & Fasilitas</title>
</head>
<body class="container mt-4">

    <h1 class="text-center">Modul Ruang & Fasilitas</h1>
    <h4 class="text-center text-muted mb-4">Data Ruang</h4>

    <div class="mb-2">
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No Gedung</th>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Fasilitas</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ruang = mysqli_fetch_assoc($hasil)): ?>
            <tr>
                <td><?= htmlspecialchars($ruang['no_gedung']) ?></td>
                <td><?= htmlspecialchars($ruang['kode_ruang']) ?></td>
                <td><?= htmlspecialchars($ruang['nama_ruang']) ?></td>
                <td><?= htmlspecialchars($ruang['fasilitas']) ?></td>
                <td><?= htmlspecialchars($ruang['kapasitas']) ?> Orang</td>
                <td>
                    <a href="edit.php?id=<?= $ruang['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>