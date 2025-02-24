
<h1>Produtos</h1>
<?php
require("config.php");
$result = $conn->query("select * from produto");

while ($row = $result->fetch_array()) {

    echo "<div class='product'>";
    echo "<div class='detalhe_produto'><h3>" . $row["produto"] . "</h3></div>";
    echo "<div class='detalhe_preco'><h4>" . $row["preco"] ."€" . "</h4></div>"; 
    
    echo "<a href='index.php?opcao=produto&id=" . $row["idproduto"] . "'>";
    echo "<img src='" . $row["imagem_url"] . "'>";   
    echo "</a>";

    if (!empty($_SESSION["admin"]) && $_SESSION["admin"] == 1)

        // echo "<a href='javascript:confirmar({$row["idproduto"]})'>X</a>";
       
        echo "<a href='javascript:confirmar({$row["idproduto"]})'><img src='img/trash.svg' id='trash'></a>";
    echo "</div>";
}

?>
<script>
    function confirmar(idproduto){
        if(confirm("tem a certeza que pretende eliminar este produto?")){

            location.href='elimina_produto_porid.php?id='+idproduto;

        }

        
            else{

                alert("Produto não eliminado!");

            }
     
        
    }


</script>




<div class="limpar"></div>