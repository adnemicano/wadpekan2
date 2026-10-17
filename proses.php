<?php
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_ruang  = $_POST['kode_ruang'];
    $nama_ruang  = $_POST['nama_ruang'];
    $no_gedung   = $_POST['nomor_gedung'];
    $kapasitas   = $_POST['kapasitas'];
    
    $fasilitas_array = [];
    if (isset($_POST['proyektor'])) {
        $fasilitas_array[] = $_POST['proyektor'];
    }
    if (isset($_POST['pc'])) {
        $fasilitas_array[] = $_POST['pc'];
    }
    
    $fasilitas = implode(', ', $fasilitas_array);
    if (empty($fasilitas)) {
    $fasilitas = "Tidak ada";
    }

    $query = "INSERT INTO tb_ruang (no_gedung, kode_ruang, nama_ruang, fasilitas, kapasitas) 
        VALUES ('$no_gedung', '$kode_ruang', '$nama_ruang', '$fasilitas', '$kapasitas')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>