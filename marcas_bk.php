<div align=center>
<h2>Marcas</h2>
<br>
<table border="1">
<tr><th>ID</th><th>Marca</th></tr>
<?php

include ("config.php");

$result=$conn->query("select * from marca order by marca");//matriz com categorias

while($row = $result->fetch_assoc()){ 
    //$row= array("idcategoria"=>1; "categoria"=>"Informática"); 

        echo "<tr>";
        echo "<td>".$row["idmarca"]."</td>";
        echo " ";
        echo "<td>".$row["marca"]."</td>";
        // echo "<br>";
        echo "</tr>";
        
}
echo "</table>";

?>