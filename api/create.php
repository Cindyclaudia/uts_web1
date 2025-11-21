<?php
header('Content-Type: application/json');
include "../config.php";

$data = json_decode(file_get_contents("php://input"), true);

$judul = $data['judul'] ?? '';
$deskripsi = $data['deskripsi'] ?? '';
$gambar = $data['gambar'] ?? ''; // bisa URL atau path upload

if($judul != '' && $deskripsi != ''){
    mysqli_query($conn, "INSERT INTO informasi(judul, deskripsi, gambar) VALUES('$judul','$deskripsi','$gambar')");
    echo json_encode(["status"=>1, "message"=>"Informasi berhasil ditambahkan"]);
}else{
    echo json_encode(["status"=>0, "message"=>"Data tidak lengkap"]);
}
?>
