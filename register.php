<?php
include "config.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        $error = "Username sudah digunakan!";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,password) VALUES('$username','$password')");
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Doll Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color:#FFEFF5; }
        .card { border-radius:15px; background-color:#FFF3F7; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-3" style="color:#FF7DA0;">Register</h3>
                <?php if(isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
                <form method="post">
                    <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                    <button type="submit" name="submit" class="btn btn-pink w-100" style="background-color:#FFB6C1; color:white;">Register</button>
                    <a href="login.php" class="d-block mt-2 text-center">Sudah punya akun? Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
