Marca:
<select name="idmarca">
<?php

include ("config.php");
$result=$conn->query("select * from marca order by marca");

while($row = $result->fetch_assoc()){ 
    //<option value "1">Informática</option>


    $idmarca = $row["idmarca"];
    $marca = $row["marca"];

        echo "<option value = '$idmarca'>$marca</option>\n";


        //echo "<option value='{$row["idcategoria"]}'>{$row["categoria"]}</option>\n";
        //echo "<option value ='".$row["idcategoria"]."'>".$row["categoria"]."</option>\n";



       
}

?>
</select>