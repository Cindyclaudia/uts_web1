<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Doll Company | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #FFEFF5; }
        .navbar { background-color: #FFB6C1 !important; }
        .card { background-color: #FFF3F7; border: 2px solid #FFD7E2; border-radius: 15px; }
        footer { background-color: #FFB6C1; }
    </style>
</head>
<body>
<nav class="navbar navbar-light mb-4">
    <div class="container">
        <h3 class="text-white fw-bold">Doll Company 🧸</h3>
        <a href="login.php" class="btn btn-light">Login</a>
    </div>
</nav>

<div class="container">
    <h2 class="text-center mb-4" style="color:#FF8EB0;">Koleksi Boneka Terbaru</h2>
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM informasi");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="<?= $row['gambar']; ?>" class="card-img-top" style="height:250px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="fw-bold" style="color:#FF8EB0;"><?= $row['judul']; ?></h5>
                    <p><?= substr($row['deskripsi'], 0, 60); ?>...</p>
                    <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-pink" style="background-color:#FFB6C1; color:white;">Lihat Detail</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<footer class="text-white text-center p-3 mt-4">
    ©Copyright by 23552011412_Cindy Claudia Septiani_TIF 23 CNS A
</footer>
</body>
</html>
