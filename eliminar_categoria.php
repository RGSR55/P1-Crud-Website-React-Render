<div class=container>
<form method="post">
    <p><?php require("categorias_select.php");?></p>
    <button>Eliminar</button>

</form>
</div>

<?php
if(!empty($_POST["idcategoria"])){

    require("config.php");

    $sql = "delete from categoria where idcategoria=".$_POST["idcategoria"];
    //echo "<hr>$sql</hr>";
    $conn->query($sql);

    header("location: index.php?opcao=eliminar_categoria");

}

?>