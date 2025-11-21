<?php
include "config.php";

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    if($_FILES['gambar']['name'] != ""){
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp,"uploads/".$gambar);
        $path = "uploads/".$gambar;
    } else {
        $path = "";
    }

    mysqli_query($conn,"INSERT INTO informasi(judul,deskripsi,gambar) VALUES('$judul','$deskripsi','$path')");
    echo "<script>alert('Informasi berhasil ditambahkan!'); window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Informasi | Doll Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Informasi Boneka</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="judul" placeholder="Judul" class="form-control mb-2" required>
        <textarea name="deskripsi" placeholder="Deskripsi" class="form-control mb-2" required></textarea>
        <input type="file" name="gambar" class="form-control mb-2" required>
        <button name="submit" class="btn btn-primary">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
