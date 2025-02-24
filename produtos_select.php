Produtos:
<select name="idproduto">
<?php

//include ("config.php");
require("config.php");
$result=$conn->query("SELECT idproduto, produto FROM produto order by produto");

while($linha = $result->fetch_assoc()){ 
   

    // $idproduto = $row["idproduto"];
    // $produto = $row["produto"];

        echo "<option value = '".$linha['idproduto']."'>".$linha["produto"]."</option>\n";
        //echo "<option value = '{$linha['idproduto']}'>{$linha["produto"]}</option>\n";


        //echo "<option value='{$row["idcategoria"]}'>{$row["categoria"]}</option>\n";
        //echo "<option value ='".$row["idcategoria"]."'>".$row["categoria"]."</option>\n";

       
}

?>
</select>