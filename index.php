<?php
require_once 'koneksi.php';

$query = "SELECT * FROM datamahasiswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal mengambil data: " . mysqli_error($koneksi));
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Data Mahasiswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-4">

        <h1 class="text-center text-primary fw-bold p-3">
            Daftar Data Mahasiswa
        </h1>

        <hr class="w-50 mx-auto border-primary border-2 opacity-75">

        <div class="d-flex justify-content-end my-4">
            <a href="tambah.php" class="btn btn-primary">
                + Tambah Data Mahasiswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle text-center shadow rounded overflow-hidden">

                <thead class="table-primary">
                    <tr>
                        <th>NIM</th>
                        <th>Angkatan</th>
                        <th>SKS Lulus</th>
                        <th>Status Keaktifan</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td>
                                    <?= htmlspecialchars($row['nim']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['angkatan']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['sks_lulus']) ?>
                                </td>

                                <td>
                                    <?php if ($row['status_keaktifan'] === 'Aktif'): ?>
                                        <span class="badge rounded-pill bg-success px-3 py-2">
                                            Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill bg-secondary px-3 py-2">
                                            Tidak Aktif
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- Tombol Edit -->
                                        <a href="edit.php?id=<?= (int) $row['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <!-- Tombol Delete -->
                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#hapus<?= (int) $row['id'] ?>">
                                            Delete
                                        </button>

                                    </div>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade"
                                        id="hapus<?= (int) $row['id'] ?>"
                                        tabindex="-1"
                                        aria-labelledby="judulHapus<?= (int) $row['id'] ?>"
                                        aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"
                                                        id="judulHapus<?= (int) $row['id'] ?>">
                                                        Konfirmasi Hapus
                                                    </h5>

                                                    <button type="button"
                                                        class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Tutup">
                                                    </button>
                                                </div>

                                                <div class="modal-body text-center py-4">
                                                    Hapus data mahasiswa dengan NIM
                                                    <strong>
                                                        <?= htmlspecialchars($row['nim']) ?>
                                                    </strong>?
                                                </div>

                                                <div class="modal-footer">

                                                    <!-- Batal -->
                                                    <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <!-- Konfirmasi Hapus -->
                                                    <form action="delete.php" method="post">
                                                        <input type="hidden"
                                                            name="id"
                                                            value="<?= (int) $row['id'] ?>">

                                                        <button type="submit"
                                                            class="btn btn-danger">
                                                            Ya, Hapus
                                                        </button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-muted py-4">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>

                    <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>