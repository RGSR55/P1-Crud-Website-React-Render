<div class=container>

    <form method="post" enctype="multipart/form-data">
        <h3>Vendas por Data</h3>
        <p><input type="date" name="start-date" placeholder="De">
            <input type="date" name="end-date" placeholder="Até">
        </p>
        <!-- <p><button type="submit" name="submit" >Gerar Relatório</button></p> -->
        <button>Gerar Relatório</button>

    </form>


<?php



if (!empty($_POST["start-date"]) && !empty($_POST["end-date"])) {

    require("config.php");

    $start = $_POST["start-date"];
    $end = $_POST["end-date"];

    // $result = $conn->query("SELECT * FROM vendas WHERE vendas.data >= '" . $start . "' && vendas.data <= '" . $end . "' ");

    $result = $conn->query("SELECT produto, quantidade, data FROM vendas INNER JOIN produto on idprodutoFK = idproduto WHERE vendas.data >= '" . $start . "' && vendas.data <= '" . $end . "' ");

    

    while ($row = $result->fetch_array()) {

        
        // echo $row['produto'];
        echo "<br>";
        echo "Produto: ".$row['produto']. " Qtd: ".$row['quantidade'] . " / DATA: " . $row['data'] . "<br>";
        echo "<br>";
    }
   
}

?>

</div> 