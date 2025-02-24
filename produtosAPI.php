<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

require("config.php");
$result = $conn->query("SELECT produto, idcategoriaFK, preco, marca, imagem_url  FROM produto inner join marca on idmarca=idmarcaFK order by stock DESC LIMIT 4");

$products = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($products);

// $response = json_encode([
//     'products' => $products,
// ]);
// echo $response;


// se for para criar um novo ficheiro produtos.json
//file_put_contents('produtos.json', json_encode($products));

?>


