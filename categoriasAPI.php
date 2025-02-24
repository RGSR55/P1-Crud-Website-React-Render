<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

require("config.php");
$result = $conn->query("SELECT categoria, idcategoria, imagem FROM categoria");

$products = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($products);



?>