
<div class="container2">
<form method="post">
<p>Novo Nome: <input type="text" name="novo_nome" required></p>
<p><button>Alterar</button></p>
    
</form>

<!-- </div> -->

<!-- $id= $_SESSION["idutilizador"]

$sql = "UPDATE utilizador SET nome = "Ruiii" WHERE utilizador.idutilizador='$id'"; -->

<?php

require("session_check.php");

if(!empty($_GET["id"]) && !empty($_POST["novo_nome"])){

    require("config.php");

    $novo = $_POST["novo_nome"];

    $sql = "UPDATE utilizador SET nome = '".$novo."' where idutilizador=".$_GET["id"];

    echo "<hr>$sql</hr>";
    
    $conn->query($sql);

    header("location: index.php?opcao=perfil");

   

}

?>

</div>