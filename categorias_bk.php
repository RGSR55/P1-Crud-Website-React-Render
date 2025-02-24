<div align=center>
<h2>Categorias</h2>
<br>
<table border="1">
<tr><th>ID</th><th>Categoria</th></tr>

<?php

//ligar ao servidor mysql
include ("config.php");
//executar o comando sql - query
$result=$conn->query("select * from categoria order by categoria");//matriz com categorias

while($row = $result->fetch_assoc()){ //enquanto ler linhas transforma em array associativo
    //$row= array("idcategoria"=>1; "categoria"=>"Informática"); 

    
        echo "<tr>";
        echo "<td>".$row["idcategoria"]."</td>";
        echo " ";
        echo "<td>".$row["categoria"]."</td>";
        // echo "<br>";
        echo "</tr>";
        
}
echo "</table>";
?>

</div>