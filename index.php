<?php
$topik_penelitian = [
    [
        "rumpun_ilmu" => "Artificial Intelligence",
        "taksonomi"   => "Computer Vision untuk Diagnosa Medis",
        "deskripsi"   => "Diagnosa Medis Pengembangan model Deep Learning berbasis CNN untuk pendeteksian dini penyakit paru-paru melalui citra Rontgen X-Ray secara otomatis.",
        "kata_kunci"  => "CNN, Medical Imaging, Deep Learning"
    ],
    [
        "rumpun_ilmu" => "Rekayasa Perangkat Lunak",
        "taksonomi"   => "Migrasi Arsitektur Microservices",
        "deskripsi"   => "Analisis performa, keandalan, dan skalabilitas sistem e-commerce saat bertransisi dari aplikasi Monolith ke arsitektur Microservices berbasis Docker.",
        "kata_kunci"  => "Microservices, Docker, Scalability"
    ],
    [
        "rumpun_ilmu" => "Jaringan & Keamanan Siber",
        "taksonomi"   => "Deteksi Serangan DDoS Menggunakan ML",
        "deskripsi"   => "Implementasi algoritma Random Forest untuk mendeteksi anomali lalu lintas jaringan dan ancaman serangan DDoS pada server Cloud secara real-time.",
        "kata_kunci"  => "Cyber Security, DDoS, Random Forest"
    ],
    [
        "rumpun_ilmu" => "Sistem Informasi & Data",
        "taksonomi"   => "Analisis Sentimen Publik pada Media Sosial",
        "deskripsi"   => "Pemanfaatan metode Natural Language Processing (NLP) dengan arsitektur BERT untuk mengklasifikasikan persepsi pengguna terhadap kebijakan publik.",
        "kata_kunci"  => "NLP, BERT, Sentiment Analysis"
    ]
];
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
    <?php foreach ($topik_penelitian as $row): ?>
    <tr>
      <td><?= $row['rumpun_ilmu']; ?></td>
      <td><?= $row['taksonomi']; ?></td>
      <td><?= $row['deskripsi']; ?></td>
      <td><?= $row['kata_kunci']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>