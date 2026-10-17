
<?php
require_once 'koneksi.php';

$pesan = '';
$tipe = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim'] ?? '');
    $angkatan = $_POST['angkatan'] ?? '';
    $sks_lulus = $_POST['sks_lulus'] ?? '';
    $status_keaktifan = $_POST['status_keaktifan'] ?? '';

    if (
        $nim === '' ||
        $angkatan === '' ||
        $sks_lulus === '' ||
        !in_array($status_keaktifan, ['Aktif', 'Tidak Aktif'], true) ||
        !ctype_digit((string) $angkatan) ||
        !ctype_digit((string) $sks_lulus)
    ) {
        $pesan = 'Data belum lengkap atau tidak valid.';
        $tipe = 'danger';
    } else {
        $sql = "INSERT INTO datamahasiswa
                (nim, angkatan, sks_lulus, status_keaktifan)
                VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($koneksi, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "siis",
                $nim,
                $angkatan,
                $sks_lulus,
                $status_keaktifan
            );

            if (mysqli_stmt_execute($stmt)) {
                $pesan = 'Data mahasiswa berhasil ditambahkan!';
                $tipe = 'success';
            } else {
                $pesan = 'Data gagal ditambahkan. Periksa kembali data yang dimasukkan.';
                $tipe = 'danger';
            }

            mysqli_stmt_close($stmt);
        } else {
            $pesan = 'Data gagal ditambahkan karena terjadi kesalahan database.';
            $tipe = 'danger';
        }
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-4">
        <h1 class="text-center text-primary fw-bold p-3">
            Tambah Data Mahasiswa
        </h1>

        <hr class="w-50 mx-auto border-primary border-2 opacity-75">

        <form method="post"
              action="tambah.php"
              class="mx-auto bg-white shadow rounded p-4 mt-4"
              style="max-width: 550px;">

            <div class="mb-3">
                <label for="nim" class="form-label fw-bold">NIM</label>
                <input type="text" class="form-control"
                       id="nim" name="nim"
                       value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>"
                       required>
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                <input type="number" class="form-control"
                       id="angkatan" name="angkatan"
                       value="<?= htmlspecialchars($_POST['angkatan'] ?? '') ?>"
                       required>
            </div>

            <div class="mb-3">
                <label for="sks_lulus" class="form-label fw-bold">SKS Lulus</label>
                <input type="number" class="form-control"
                       id="sks_lulus" name="sks_lulus"
                       min="0" max="144"
                       value="<?= htmlspecialchars($_POST['sks_lulus'] ?? '') ?>"
                       required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label fw-bold">
                    Status Keaktifan
                </label>

                <select class="form-select" id="status"
                        name="status_keaktifan" required>
                    <option value="">-- Pilih Status --</option>

                    <option value="Aktif"
                        <?= ($_POST['status_keaktifan'] ?? '') === 'Aktif' ? 'selected' : '' ?>>
                        Aktif
                    </option>

                    <option value="Tidak Aktif"
                        <?= ($_POST['status_keaktifan'] ?? '') === 'Tidak Aktif' ? 'selected' : '' ?>>
                        Tidak Aktif
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">
                Tambah Data
            </button>

            <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">
                Kembali
            </a>
        </form>
    </div>

    <?php if ($pesan !== ''): ?>
        <div class="modal fade" id="notifikasiModal"
             tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header <?= $tipe === 'success' ? 'bg-success' : 'bg-danger' ?> text-white">
                        <h5 class="modal-title">
                            <?= $tipe === 'success' ? 'Berhasil!' : 'Gagal!' ?>
                        </h5>

                        <?php if ($tipe !== 'success'): ?>
                            <button type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                        <?php endif; ?>
                    </div>

                    <div class="modal-body text-center py-4">
                        <?= htmlspecialchars($pesan) ?>
                    </div>

                    <div class="modal-footer">
                        <?php if ($tipe === 'success'): ?>
                            <span class="text-muted small">
                                Mengalihkan ke daftar mahasiswa...
                            </span>
                        <?php else: ?>
                            <button type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">
                                Tutup
                            </button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($pesan !== ''): ?>
        <script>
            const modalElement = document.getElementById('notifikasiModal');
            const modal = new bootstrap.Modal(modalElement);

            modal.show();

            <?php if ($tipe === 'success'): ?>
                setTimeout(function () {
                    window.location.href = 'index.php';
                }, 1800);
            <?php endif; ?>
        </script>
    <?php endif; ?>

</body>
</html>
