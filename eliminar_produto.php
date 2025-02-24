<div class=container>
<form method="post">
    
   
   <p><?php include("produtos_select.php");?></p>
    <button>Eliminar</button>

</form>
</div>

<?php
if(!empty($_POST["idproduto"])){

    require("config.php");

    $sql = "delete from produto where idproduto=".$_POST["idproduto"];
    //echo "<hr>$sql</hr>";
    
    $conn->query($sql);

    header("location: index.php?opcao=produtos");

}

?>