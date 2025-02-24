

<?php
// session_start();
require("session_check.php");

if(!empty($_GET["id"])){

    require("config.php");

    $sql = "delete from produto where idproduto=".$_GET["id"];
    //echo "<hr>$sql</hr>";
    
    $conn->query($sql);

    header("location: index.php?opcao=produtos");

}

?>