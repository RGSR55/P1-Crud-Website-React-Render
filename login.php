
<div class="container">
<form method="post">
    <p>Login: <input type="text" name="login" required></p>
    <p>Password: <input type="password111" name="password" required></p>
    <p><button>entrar</button></p>
</form>
</div>


<?php

if (!empty($_POST["login"])){

    require("config.php");

    $login = $_POST["login"];
    $password = $_POST["password"]; //sql injection 'or' 1=1

   
    $sql = "select * from utilizador where login='$login' and password='$password'";
    //$sql = "select * from utilizador where login='$login' and password='".md5($password)."'";

    echo "<hr>$sql</hr>";
    $result=$conn->query($sql);

 
    // echo $result->num_rows;^

    if($row = $result->fetch_assoc()){
        //login válido leu linha user
        
        $_SESSION["idutilizador"] = $row["idutilizador"];
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["login"] = $row["login"];
        $_SESSION["admin"] = $row["admin"];
        $_SESSION["foto"] = $row["foto"];

        header("location: index.php");

    }
    else{
        echo"<p>credenciais incorretas</p>";
    }


}

?>