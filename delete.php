
<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header('Location: index.php?hapus=gagal');
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM datamahasiswa WHERE id = ?"
);

if (!$stmt) {
    header('Location: index.php?hapus=gagal');
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);
$berhasil = mysqli_stmt_execute($stmt);

if ($berhasil && mysqli_stmt_affected_rows($stmt) > 0) {
    mysqli_stmt_close($stmt);
    header('Location: index.php?hapus=berhasil');
    exit;
}

mysqli_stmt_close($stmt);
header('Location: index.php?hapus=gagal');
exit;
?>
