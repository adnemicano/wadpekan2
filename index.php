<?php
require_once 'koneksi.php'; 

$query  = "SELECT * FROM topikbidangilmu ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topik dan Bidang Minat</title>
    <link rel="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>Modul Topik dan Bidang Minat</h1>
    <a href = "tambah.php" class = "btn btn-primary mb-3">Tambah Topik</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Rumpun ilmu</th>
      <th scope="col">Pengelolaan taksonomi topik riset</th>
      <th scope="col">Deskripsi fokus</th>
      <th scope="col">Kata kunci penelitian</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['Rumpun_Ilmu']); ?></td>
                <td><?= htmlspecialchars($row['Pengelolaan_Taksonomi_Topik_Riset']); ?></td>    
                <td><?= htmlspecialchars($row['Deskripsi_Fokus']); ?></td>
                <td><?= htmlspecialchars($row['Kata_Kunci_Penelitian']); ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>"class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>"class="btn btn-danger btn-sm">Hapus</a>
                </td>   
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" class="text-center">Belum ada data topik penelitian.</td>
        </tr>
    <?php endif; ?>
</tbody>
</table>
</body>
</html>
