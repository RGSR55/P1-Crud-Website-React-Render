<!-- <style>
.product { width:700px; margin:2rem;}
.product img {width: 500px;}
</style> -->

<?php
require("config.php");
if (!empty($_GET["id"])){
    $result=$conn->query("select * from produto INNER JOIN marca on idmarcaFK = idmarca where idproduto =" .$_GET["id"]);

    if($row = $result->fetch_array()){
        echo "<div class='product'>";
        echo "<h3>".$row["produto"]."</h3>";
        echo "Marca: " .$row["marca"]. "&nbsp&nbsp&nbsp" ."Preço: ".$row["preco"]."€";   
        
        echo "<br>Ainda há ".$row["stock"]."<br>";
        echo "<a href='".$row["imagem_url"]."'>";
        echo "<img src='".$row["imagem_url"]."'>";
        echo "</a>";
        echo "</div>";
    }
    else {
        // não existe produto com aquele id!
        echo "<h3>produto não encontrado!</h3>";
        ?>
        <script>
            setTimeout(function(){
                location.href="index.php?opcao=produto";
            },3000);
        </script>
       <?php        
    }
}
else
  header("location: index.php?opcao=produtos");



?>