<?php
header('Content-Type: application/json');
include "../config.php";

$result = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
$info = [];
while($row = mysqli_fetch_assoc($result)){
    $info[] = $row;
}
echo json_encode($info);
?>
