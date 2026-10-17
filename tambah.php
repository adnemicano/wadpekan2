<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_ruang   = $_POST["kode_ruang"];
    $nama_ruang   = $_POST["nama_ruang"];
    $nomor_gedung = $_POST["nomor_gedung"];
    $kapasitas    = $_POST["kapasitas"];
    
    $fasilitas_array = [];
    if (isset($_POST["proyektor"])) {
        $fasilitas_array[] = "Proyektor";
    }
    if (isset($_POST["pc"])) {
        $fasilitas_array[] = "PC";
    }
    
    $fasilitas = implode(", ", $fasilitas_array);
    if (empty($fasilitas)) {
        $fasilitas = "Tidak ada";
    }

    $sql = "INSERT INTO tb_ruang (no_gedung, kode_ruang, nama_ruang, fasilitas, kapasitas) 
            VALUES (?, ?, ?, ?, ?)";
    
    $simpan = mysqli_execute_query($koneksi, $sql, [
        $nomor_gedung,
        $kode_ruang,
        $nama_ruang,
        $fasilitas,
        $kapasitas
    ]);
    
    if ($simpan) {
        echo "<script>
                alert('Data berhasil disimpan!');
                window.location.href = 'index.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Ruang Sidang</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 400px;
            margin: 40px auto;
            padding: 0 20px;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 4px;
        }

        button[type="submit"] {
            padding: 9px 18px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #004c99;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Daftar Ruang</a> |
        <a href="tambah.php">Tambah Ruang</a>
    </nav>
    <hr>

    <h2>Formulir Tambah Ruang Sidang</h2>

    <form action="" method="POST">
        <div>
            <label for="kode_ruang">Kode Ruang:</label><br>
            <input type="text" id="kode_ruang" name="kode_ruang" required>
        </div>
        <br>
        <div>
            <label for="nama_ruang">Nama Ruang:</label><br>
            <input type="text" id="nama_ruang" name="nama_ruang" required>
        </div>
        <br>
        <div>
            <label for="nomor_gedung">Nomor / Nama Gedung:</label><br>
            <input type="text" id="nomor_gedung" name="nomor_gedung" required>
        </div>
        <br>
        <div>
            <label for="kapasitas">Kapasitas (Orang):</label><br>
            <input type="number" id="kapasitas" name="kapasitas" min="1" required>
        </div>
        <br>
        <div>
            <label>Fasilitas Ruangan:</label><br>
            <input type="checkbox" id="proyektor" name="proyektor" value="1">
            <label for="proyektor">Proyektor</label><br>
            <input type="checkbox" id="pc" name="pc" value="1">
            <label for="pc">PC / Komputer</label>
        </div>
        <br>
        <button type="submit">Kirim Data</button>
    </form>
</body>
</html>