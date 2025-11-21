<?php
include "config.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM informasi WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "<script>alert('Informasi tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Boneka | <?= $row['judul']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color:#FFEFF5; }
        .navbar { background-color:#FFB6C1; }
        footer { background-color:#FFB6C1; }
        .card { border-radius:15px; background-color:#FFF3F7; }
    </style>
</head>
<body>
<nav class="navbar navbar-light">
    <div class="container">
        <a href="index.php" class="btn btn-light">← Kembali</a>
        <h4 class="text-pink fw-bold">Doll Company 🧸</h4>
    </div>
</nav>

<div class="container mt-4">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-3" style="color:#FF7DA0;"><?= $row['judul']; ?></h2>
        <div class="text-center mb-3">
            <img src="<?= $row['gambar']; ?>" class="img-fluid" style="max-height:400px; border-radius:10px;">
        </div>
        <p style="font-size:16px; color:#FF8EB0;"><?= $row['deskripsi']; ?></p>
    </div>
</div>

<footer class="text-white text-center p-3 mt-4">
    ©Copyright by 23552011412_Cindy Claudia Septiani_TIF 23 CNS A
</footer>
</body>
</html>
