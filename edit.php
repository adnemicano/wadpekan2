
<?php
include 'koneksi.php';

$id = $_GET['id'] ?? '';

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM topikbidangilmu WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan!");
}

if (isset($_POST['update'])) {
    $rumpun_ilmu = $_POST['rumpun_ilmu'];
    $topik_riset = $_POST['topik_riset'];
    $deskripsi_fokus = $_POST['deskripsi_fokus'];
    $kata_kunci = $_POST['kata_kunci'];

    $update = mysqli_query($koneksi, "UPDATE topikbidangilmu SET
        rumpun_ilmu = '$rumpun_ilmu',
        topik_riset = '$topik_riset',
        deskripsi_fokus = '$deskripsi_fokus',
        kata_kunci = '$kata_kunci'
        WHERE id = '$id'
    ");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Topik Bidang Ilmu</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Topik Bidang Ilmu</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="">

                        <div class="mb-3">
                            <label for="rumpun_ilmu" class="form-label">
                                Rumpun Ilmu
                            </label>

                            <input
                                type="text"
                                name="rumpun_ilmu"
                                id="rumpun_ilmu"
                                class="form-control"
                                value="<?= htmlspecialchars($data['rumpun_ilmu']) ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="topik_riset" class="form-label">
                                Pengelolaan Topik Riset
                            </label>

                            <input
                                type="text"
                                name="topik_riset"
                                id="topik_riset"
                                class="form-control"
                                value="<?= htmlspecialchars($data['topik_riset']) ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_fokus" class="form-label">
                                Deskripsi Fokus
                            </label>

                            <textarea
                                name="deskripsi_fokus"
                                id="deskripsi_fokus"
                                class="form-control"
                                rows="3"
                            ><?= htmlspecialchars($data['deskripsi_fokus']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kata_kunci" class="form-label">
                                Kata Kunci Penelitian
                            </label>

                            <input
                                type="text"
                                name="kata_kunci"
                                id="kata_kunci"
                                class="form-control"
                                value="<?= htmlspecialchars($data['kata_kunci']) ?>"
                            >
                        </div>

                        <button
                            type="submit"
                            name="update"
                            class="btn btn-primary"
                        >
                            Update
                        </button>

                        <a href="index.php" class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
