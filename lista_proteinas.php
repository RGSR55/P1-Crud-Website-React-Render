<?php
require("config.php");
if (!empty($_GET["cat"])){
    $result=$conn->query("SELECT produto,preco,imagem_url, marca FROM produto inner join marca on idmarca=idmarcaFK inner join categoria on idcategoria=idcategoriaFK where idcategoria=" .$_GET["cat"]);

    while ($row = $result->fetch_array()){
        echo "<div class='product'>";
        echo "<h2>".$row["produto"]."</h2>";
        echo "<h3>".$row["marca"]."</h3>";    
        echo "Preço: ".$row["preco"]."€";
        echo "<br><img src='".$row["imagem_url"]."'>"; 
        echo "</div>";}
}
    else {
        
        echo "<h3>Sem stock de momento!</h3>";
        ?>
        <script>
            setTimeout(function(){
                location.href="index.php?opcao=produtos";
            },3000);
        </script>
       <?php        
    }




?>