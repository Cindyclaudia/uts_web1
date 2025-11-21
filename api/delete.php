<?php
header('Content-Type: application/json');
include "../config.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? 0;

if($id){
    mysqli_query($conn, "DELETE FROM informasi WHERE id='$id'");
    echo json_encode(["status"=>1, "message"=>"Informasi berhasil dihapus"]);
}else{
    echo json_encode(["status"=>0, "message"=>"ID tidak ditemukan"]);
}
?>
