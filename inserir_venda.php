
<div class=container>
<form action="" method="post" enctype="multipart/form-data">

    
    <p> <?php include("produtos_select.php");?></p>
    <p>quantidade: <input type="number" name="quantidade" min="1" required></p>
    <p>data:<input type="date" name="data"></p>

    <p><button>adicionar venda</button></p>
</form>
</div>

<?php


if (!empty($_POST["quantidade"]) && $_POST["quantidade"]>=1) { 

   
    include("config.php");


    $idproduto = $_POST["idproduto"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];


    $sql = "insert into vendas(quantidade, data, idprodutoFK) 
            values ('$quantidade', '$data','$idproduto')";

    echo "<hr>$sql</hr>";

    $conn->query($sql);

    if ($conn->affected_rows == 1) {


        // if($row["stock"]<20){

        // $stock = $row["stock"];

        // echo  "<script>alert('.$stock.');</script>";
       
        // Alerta( "Stock Baixo " .$row["produto"]. "com apenas" .$row["quantidade"] );

        // echo  "Stock Baixo " .$row["produto"]. "com apenas" .$row["quantidade"];

    //    Alerta("Venda inserida"); 

    $conn->close();
    header("location: index.php?opcao=vendas");


    }



     else {

        echo "<p>erro: venda não inserida!</p>";
        $conn->close();

    }
   





    // if($row["stock"]<10){

    //     $stock = $row["stock"];

    //     echo  "<script>alert('.$stock.');</script>";
       
    //     phpAlert( "Produto " .$row["produto"]. "com apenas" .$row["quantidade"] );
    //     // echo  "Produto " .$row["produto"]. "com apenas" .$row["quantidade"];

    //     }








/*    select produto,preco as preço, produto.*
from produto
where stock>=0 and idcategoriaFK=14 
and produto like'%a%'
order by preco asc
limit 10*/


// DELIMITER $$
// CREATE TRIGGER `atualizador_stock_update` AFTER UPDATE ON `vendas`
// FOR EACH ROW
// begin
// update produto
// set stock =stock + OLD.quantidade-NEW.quantidade
// where idproduto = OLD.idprodutoFK;
// end
// $$
// DELIMITER ;


// DELIMITER $$
// CREATE TRIGGER `atualizador_stock_delete` AFTER DELETE ON `vendas` 
// FOR EACH ROW 
// begin
//     update produto
//     set stock =stock + OLD.quantidade
//     where idproduto = OLD.idprodutoFK;
// end
// $$
// DELIMITER ;


// DELIMITER $$
// CREATE TRIGGER `atualizador_stock_insert` AFTER INSERT ON `vendas` 
// FOR EACH ROW 
// begin
//     update produto
//     set stock =stock - NEW.quantidade
//     where idproduto = NEW.idprodutoFK;
// end
// $$
// DELIMITER ;


}

?>