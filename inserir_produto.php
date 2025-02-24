<div class=container>
<form action="" method="post" enctype="multipart/form-data">

    <p>Produto: <input type="text" name="produto" required></p>
    <p>Preço: <input type="number" name="preco" step="0.01" min="0" max="99999.99" required></p>
    <p>Stock: <input type="number" name="stock" min="0" max="999"> </p>
    <p>Imagem:<input type="file" name="imagem"></p>
    <p> <?php include("categorias_select.php");?></p>
    <p> <?php include("marcas_select.php");?></p>

    <p><button>adicionar</button></p>
</form>
</div>

<?php

//se o formulário foi submetido e se o campo estiver preenchido

if (!empty($_POST["produto"])) { //array Post com os dados 

    $imagem_url="null";
// upload da imagem

if ($_FILES["imagem"]["error"]==0){
    move_uploaded_file($_FILES["imagem"]["tmp_name"],"img/".$_FILES["imagem"]["name"]);
    $imagem_url="'img/".$_FILES["imagem"]["name"]."'";


}

    //ligar ao servidor mysql
    include("config.php");

    //executar a query

    $produto = $_POST["produto"];
    $preco = $_POST["preco"];

    if (!empty($_POST["stock"]))
        $stock = $_POST["stock"];

    else
        $stock = 0;

    $idcategoria = $_POST["idcategoria"];
    $idmarca = $_POST["idmarca"];


    $sql = "insert into produto(produto, preco, stock, idcategoriaFK, idmarcaFK, imagem_url) 
            values ('$produto', '$preco', '$stock', '$idcategoria', '$idmarca', $imagem_url)";

    echo "<hr>$sql</hr>";

    $conn->query($sql);

    if ($conn->affected_rows == 1) {//variavel conection no config acedemos metodo query 
       // echo "<p>Produto <b>$produto</b> inserido com sucesso!</p>";

    $conn->close();
    header("location: index.php?opcao=produtos");
    }

    else {
        echo "<p>erro: produto não inserido!</p>";
        $conn->close();

    }
   

/*    select produto,preco as preço, produto.*
from produto
where stock>=0 and idcategoriaFK=14 
and produto like'%a%'
order by preco asc
limit 10*/

}

?>