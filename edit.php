
<?php
require_once 'koneksi.php';

$pesan = '';
$tipe = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nim = trim($_POST['nim'] ?? '');
    $angkatan = $_POST['angkatan'] ?? '';
    $sks_lulus = $_POST['sks_lulus'] ?? '';
    $status_keaktifan = $_POST['status_keaktifan'] ?? '';

    if (!$id || $nim === '' || $angkatan === '' || $sks_lulus === '' ||
        !ctype_digit((string) $angkatan) ||
        !ctype_digit((string) $sks_lulus) ||
        (int) $sks_lulus > 144 ||
        !in_array($status_keaktifan, ['Aktif', 'Tidak Aktif'], true)) {

        $pesan = 'Data tidak valid. Periksa kembali input kamu.';
        $tipe = 'danger';

    } else {
        $sql = "UPDATE datamahasiswa
                SET nim = ?, angkatan = ?, sks_lulus = ?,
                    status_keaktifan = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($koneksi, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt, "siisi",
                $nim, $angkatan, $sks_lulus,
                $status_keaktifan, $id
            );

            if (mysqli_stmt_execute($stmt) &&
                mysqli_stmt_affected_rows($stmt) >= 0) {
                $pesan = 'Data mahasiswa berhasil diperbarui!';
                $tipe = 'success';
            } else {
                $pesan = 'Data gagal diperbarui. Silakan coba lagi.';
                $tipe = 'danger';
            }

            mysqli_stmt_close($stmt);
        } else {
            $pesan = 'Terjadi kesalahan database.';
            $tipe = 'danger';
        }
    }
}

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM datamahasiswa WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center text-primary fw-bold p-3">
        Edit Data Mahasiswa
    </h1>

    <hr class="w-50 mx-auto border-primary border-2 opacity-75">

    <form method="post" action="edit.php?id=<?= (int) $id ?>"
          class="mx-auto bg-white shadow rounded p-4 mt-4"
          style="max-width: 550px;">

        <input type="hidden" name="id" value="<?= (int) $id ?>">

        <div class="mb-3">
            <label for="nim" class="form-label fw-bold">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim"
                   value="<?= htmlspecialchars($_POST['nim'] ?? $data['nim']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label for="angkatan" class="form-label fw-bold">Angkatan</label>
            <input type="number" class="form-control" id="angkatan"
                   name="angkatan"
                   value="<?= htmlspecialchars($_POST['angkatan'] ?? $data['angkatan']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label for="sks_lulus" class="form-label fw-bold">SKS Lulus</label>
            <input type="number" class="form-control" id="sks_lulus"
                   name="sks_lulus" min="0" max="144"
                   value="<?= htmlspecialchars($_POST['sks_lulus'] ?? $data['sks_lulus']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label fw-bold">
                Status Keaktifan
            </label>
            <?php $status = $_POST['status_keaktifan'] ?? $data['status_keaktifan']; ?>

            <select class="form-select" id="status"
                    name="status_keaktifan" required>
                <option value="Aktif" <?= $status === 'Aktif' ? 'selected' : '' ?>>
                    Aktif
                </option>
                <option value="Tidak Aktif" <?= $status === 'Tidak Aktif' ? 'selected' : '' ?>>
                    Tidak Aktif
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">
            Simpan Perubahan
        </button>

        <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">
            Kembali
        </a>
    </form>
</div>

<?php if ($pesan !== ''): ?>
<div class="modal fade" id="notifikasiModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header <?= $tipe === 'success' ? 'bg-success' : 'bg-danger' ?> text-white">
                <h5 class="modal-title">
                    <?= $tipe === 'success' ? 'Berhasil!' : 'Gagal!' ?>
                </h5>
                <?php if ($tipe !== 'success'): ?>
                    <button type="button" class="btn-close btn-close-white"
                            data-bs-dismiss="modal"></button>
                <?php endif; ?>
            </div>

            <div class="modal-body text-center py-4">
                <?= htmlspecialchars($pesan) ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php if ($pesan !== ''): ?>
<script>
    const modal = new bootstrap.Modal(
        document.getElementById('notifikasiModal')
    );
    modal.show();

    <?php if ($tipe === 'success'): ?>
    setTimeout(() => {
        window.location.href = 'index.php';
    }, 1800);
    <?php endif; ?>
</script>
<?php endif; ?>

</body>
</html>
