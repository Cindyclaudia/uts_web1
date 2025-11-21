<?php
session_start();
include "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($cek);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        header("location: dashboard.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Doll Company</title>
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
                <h3 class="text-center mb-3" style="color:#FF7DA0;">Login</h3>
                <?php if(isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
                <form method="post">
                    <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                    <button type="submit" name="submit" class="btn btn-pink w-100" style="background-color:#FFB6C1; color:white;">Login</button>
                    <a href="register.php" class="d-block mt-2 text-center">Belum punya akun? Register</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
