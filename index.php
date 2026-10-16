<?php

require_once 'koneksi.php';

$query  = "SELECT * FROM topikbidangilmu ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rumpun_ilmu     = $_POST['rumpun_ilmu'] ?? '';
    $topik_riset     = $_POST['topik_riset'] ?? '';
    $deskripsi_fokus = $_POST['deskripsi_fokus'] ?? '';
    $kata_kunci      = $_POST['kata_kunci'] ?? '';

    if (!empty($rumpun_ilmu) && !empty($topik_riset)) {
        $sql = "INSERT INTO topikbidangilmu (Rumpun_Ilmu, Pengelolaan_Taksonomi_Topik_Riset, Deskripsi_Fokus, Kata_Kunci_Penelitian) 
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
