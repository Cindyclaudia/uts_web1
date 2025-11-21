<?php 
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
$infoCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM informasi"))['total'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Doll Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color:#FFEFF5; }
        .navbar { background-color:#FFB6C1; }
        footer { background-color:#FFB6C1; }
        .card { border-radius:15px; background-color:#FFF3F7; }
        .btn-pink { background-color:#FFB6C1; color:white; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <h4 class="text-white">Dashboard Admin</h4>
        <a href="logout.php" class="btn btn-light">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="alert alert-success">
        <h4>Selamat Datang, <b><?= $_SESSION['username']; ?></b> 👋</h4>
        <p>Dashboard Boneka Pastel</p>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary p-3">
                <h5>Total Pengguna</h5>
                <h2><?= $userCount; ?></h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-warning p-3">
                <h5>Total Informasi Boneka</h5>
                <h2><?= $infoCount; ?></h2>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <div class="d-flex justify-content-between mb-3">
            <h5>Daftar Informasi Boneka</h5>
            <a href="create_info.php" class="btn btn-pink">+ Tambah Informasi</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            $info = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($info)){
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><img src="<?= $row['gambar']; ?>" width="80"></td>
                    <td><?= substr($row['deskripsi'],0,60); ?>...</td>
                    <td>
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="edit_info.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('Yakin hapus?')" href="delete_info.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="text-white text-center p-3 mt-4">
©Copyright by 23552011412_Cindy Claudia Septiani_TIF 23 CNS A
</footer>

</body>
</html>
