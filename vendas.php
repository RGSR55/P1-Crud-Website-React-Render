<!-- <style>
    
    .venda{border:1px solid; width: 500px; margin:1rem;}

    
</style> -->

<?php
function Alerta($msg) {

    echo '<script>alert("' . $msg . '")</script>';
    

}
?>


<div align=center>
    <h2>Vendas</h2>
    <br>
    <table border="1">
        <tr>
            <th><h2>Produto</h2></th>
            <th><h2>Quantidade(s)</h2></th>
            <th><h2>Data</h2></th>
            <th><h2>Stock</h2></th>

        </tr>


        <?php
        require("config.php");
        $result = $conn->query("SELECT * FROM vendas inner join produto on idprodutoFK = idproduto order by data desc");

        while ($row = $result->fetch_array()) {

            // echo "<div class='venda'>";
            // echo "Produto: <em>".$row["produto"]."</em> &nbsp&nbsp&nbsp";
            // echo "Quantidade: ".$row['quantidade']."&nbsp&nbsp&nbsp";

            // echo "Data: ".$row['data'];

            echo "<tr>";
            echo "<td>" . $row["produto"] . "</td>";
            echo "<td>" . $row["quantidade"] . "</td>";
            echo "<td>" . $row["data"] . "</td>";
            echo "<td>" .$row["stock"] . "</td>";

            // echo "<br>";
            echo "</tr>";


    if($row["stock"]<20){


    Alerta( "Stock Baixo de " .$row["produto"]. " apenas " .$row["stock"]. " unidades");
    }
       
        // 

        // echo  "Stock Baixo " .$row["produto"]. "com apenas" .$row["quantidade"];

    
            // echo "</div>";
        }


        echo "</table>";

       


        ?>