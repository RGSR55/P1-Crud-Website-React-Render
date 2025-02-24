<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

require("config.php");
$result = $conn->query("SELECT produto, preco, marca, imagem_url from vendas inner join produto on idprodutoFK = idproduto inner join marca on idmarca=idmarcaFK order by quantidade DESC LIMIT 3");

$products = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($products);


?>