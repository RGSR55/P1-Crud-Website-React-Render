<div class=container>
<form method="post">
    <p><?php require("marcas_select.php");?></p>
    <button>Eliminar</button>

</form>
</div>

<?php
if(!empty($_POST["idmarca"])){

    require("config.php");

    $sql = "delete from marca where idmarca=".$_POST["idmarca"];
    //echo "<hr>$sql</hr>";
    $conn->query($sql);

    header("location: index.php?opcao=eliminar_marca");

}

?>