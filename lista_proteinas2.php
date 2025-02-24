<?php
require("config.php");
if (!empty($_GET["cat"])){
    $result=$conn->query("SELECT produto,preco,imagem_url FROM produto inner join marca on idmarca=idmarcaFK where idmarca=" .$_GET["cat"]);

    while ($row = $result->fetch_array()){
        echo "<div class='product'>";
        echo "<h2>".$row["produto"]."</h2>";    
        echo "<br>Preço: ".$row["preco"]."€<br>";
        echo "<img src='".$row["imagem_url"]."'>"; 
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