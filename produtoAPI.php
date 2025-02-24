<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

if(!empty($_GET["id"])){
require("config.php");

//localhost/loja/produtoAPI.php?id=5

$id=$_GET["id"];

$result = $conn->query("SELECT * FROM produto inner join marca on idmarca=idmarcaFK 
where idproduto='$id' ");

$products = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($products);

// $response = json_encode([
//     'products' => $products,
// ]);
// echo $response;

// se for para criar um novo ficheiro produtos.json
//file_put_contents('produtos.json', json_encode($products));
}

else {

    echo '[] ';
}
