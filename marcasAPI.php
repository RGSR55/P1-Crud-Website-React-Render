<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

require("config.php");
$result = $conn->query("SELECT marca, idmarca, imagem FROM marca");

$products = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($products);



?>