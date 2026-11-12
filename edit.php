<?php
require_once 'koneksi.php';

$id = $_GET['id'] ?? '';

if (empty($id)) {
    header("Location: index.php");
    exit();
}

// 2. Ambil data lama berdasarkan ID dari database
$query  = "SELECT * FROM topik_bidang_ilmu WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data   = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan, balikkan ke index.php
if (!$data) {
    header("Location: index.php");
    exit();
}

// 3. Proses update data saat form disubmit (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rumpun_ilmu     = $_POST['rumpun_ilmu'] ?? '';
    $topik_riset     = $_POST['topik_riset'] ?? '';
    $deskripsi_fokus = $_POST['deskripsi_fokus'] ?? '';
    $kata_kunci      = $_POST['kata_kunci'] ?? '';

    if (!empty($rumpun_ilmu) && !empty($topik_riset)) {
        $sql = "UPDATE topik_bidang_ilmu SET 
                    Rumpun_Ilmu = '$rumpun_ilmu',
                    Pengelolaan_Taksonomi_Topik_Riset = '$topik_riset',
                    Deskripsi_Fokus = '$deskripsi_fokus',
                    Kata_Kunci_Penelitian = '$kata_kunci'
                WHERE id = '$id'";

        if (mysqli_query($koneksi, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Topik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2>Edit Data Topik dan Bidang Minat</h2>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="rumpunilmuTextInput" class="form-label">Rumpun Ilmu</label>
                <input type="text" name="rumpun_ilmu" id="rumpunilmuTextInput" class="form-control" value="<?= htmlspecialchars($data['Rumpun_Ilmu']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="topikrisetTextInput" class="form-label">Pengelolaan Topik Riset</label>
                <input type="text" name="topik_riset" id="topikrisetTextInput" class="form-control" value="<?= htmlspecialchars($data['Pengelolaan_Taksonomi_Topik_Riset']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsifokusTextInput" class="form-label">Deskripsi Fokus</label>
                <input type="text" name="deskripsi_fokus" id="deskripsifokusTextInput" class="form-control" value="<?= htmlspecialchars($data['Deskripsi_Fokus']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="katakunciTextInput" class="form-label">Kata Kunci Penelitian</label>
                <input type="text" name="kata_kunci" id="katakunciTextInput" class="form-control" value="<?= htmlspecialchars($data['Kata_Kunci_Penelitian']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>