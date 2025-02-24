Categoria:
<select name="idcategoria">
<?php

include ("config.php");
$result=$conn->query("select * from categoria order by categoria");

while($row = $result->fetch_assoc()){ 
    //<option value "1">Informática</option>


    $idcategoria = $row["idcategoria"];
    $categoria = $row["categoria"];

        echo "<option value = '$idcategoria'>$categoria</option>\n";


        //echo "<option value='{$row["idcategoria"]}'>{$row["categoria"]}</option>\n";
        //echo "<option value ='".$row["idcategoria"]."'>".$row["categoria"]."</option>\n";



       
}

?>
</select>