<div class="container2">
<?php
// require("session_check.php");
// session_start();
require("config.php");
// if (!empty($_SESSION["Idutilizador"])) session_start();

$id= $_SESSION["idutilizador"];
$result = $conn->query("select * from utilizador WHERE utilizador.idutilizador='$id'");

while ($row = $result->fetch_array()) {

    echo "<div class='container'>";
    echo "<b>Detalhes da sua Conta</b>";
    echo "<br>";
    echo "Login: " . $row["login"];
    echo"<br>";
    echo"Password: ".$row["password"];
    echo"<br>";
    

    if($row["admin"]==1){
        echo "Status: Admin";

    }

    else {
        echo"Status: Funcionário";
    }

    echo"<br>";
   
    echo "Nome: ".$row['nome'];

    
    // echo "<br>";
    // echo "<a href='index.php?opcao=produto&id=" . $row["idutilizador"] . "'>";
    
    // echo "</a>";

    

     echo "<a href='editar_nome.php?id=" . $row["idutilizador"] . "'><img src='img/pencil.svg' id='trash'></a>";
       

    echo "</div>";

    // echo "<a href='editar_nome.php?id="

    
}


?>

</div>

