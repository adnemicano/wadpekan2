<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rumpun_ilmu     = $_POST['rumpun_ilmu'] ?? '';
    $topik_riset     = $_POST['topik_riset'] ?? '';
    $deskripsi_fokus = $_POST['deskripsi_fokus'] ?? '';
    $kata_kunci      = $_POST['kata_kunci'] ?? '';

}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Topik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<form action="" method="POST">
  <div class="mb-3">
    <label for="rumpunilmuTextInput" class="form-label">Rumpun Ilmu</label>
    <input type="text" name="rumpun_ilmu" id="rumpunilmuTextInput" class="form-control" placeholder="Input Rumpun Ilmu">
  </div>
  <div class="mb-3">
    <label for="topikrisetTextInput" class="form-label">Pengelolaan Topik Riset</label>
    <input type="text" name="topik_riset" class="form-control" id="topikrisetTextInput" placeholder="Input Topik Riset">
  </div>
  <div class="mb-3">
    <label for="deskripsifokusTextInput" class="form-label">Deskripsi Fokus</label>
    <input type="text" name="deskripsi_fokus" class="form-control" id="deskripsifokusTextInput" placeholder="Masukkan Deskripsi Fokus">
  </div>
  <div class="mb-3">
    <label for="katakunciTextInput" class="form-label">Kata Kunci Penelitian</label>
    <input type="text" name="kata_kunci" class="form-control" id="katakunciTextInput" placeholder="Masukkan Kata Kunci">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>