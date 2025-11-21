<?php
header('Content-Type: application/json');
include "../config.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? 0;
$judul = $data['judul'] ?? '';
$deskripsi = $data['deskripsi'] ?? '';
$gambar = $data['gambar'] ?? '';

if($id && $judul != '' && $deskripsi != ''){
    mysqli_query($conn, "UPDATE informasi SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'");
    echo json_encode(["status"=>1, "message"=>"Informasi berhasil diupdate"]);
}else{
    echo json_encode(["status"=>0, "message"=>"Data tidak lengkap"]);
}
?>
