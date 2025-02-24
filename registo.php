<div class=container>
    <form action="" method="post" enctype="multipart/form-data">

        <p>Nome: <input type="text" name="nome" required></p>
        <p>Username: <input type="text" name="login" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <p>Confirmar Password: <input type="password" name="rpassword" required></p>
        <p>Imagem:<input type="file" name="imagem"></p>
        <p><button>registar</button></p>
    </form>
</div>

<?php

if($_POST){

    $foto = "null";

    if ($_FILES["imagem"]["error"]==0){
        move_uploaded_file($_FILES["imagem"]["tmp_name"],"img/".$_FILES["imagem"]["name"]);
        $foto="'img/".$_FILES["imagem"]["name"]."'";}

        include("config.php");

        $login = $_POST["login"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];
        $nome = $_POST["nome"];
        $admin = "null";
        
     if (!empty($_POST["login"]) && $password == $rpassword) {

    
    $result = $conn->query("select * from utilizador where login = '$login'");
    $teste = mysqli_num_rows($result);
    if ($teste == 0) {


        $sql = "insert into utilizador(login, password, nome, admin, foto) 
            values ('$login','$password','$nome', '$admin', $foto)";

        echo "<hr>$sql</hr>";

        $conn->query($sql);

        if ($conn->affected_rows == 1) {


            echo "Registo Efetuado";

            $conn->close();
            header("location: index.php?opcao=home");
        } else {

            echo "<p>Erro ao registar!</p>";
            $conn->close();
        }
    }


    // include("config.php");



    else if ($num > 0) {
        echo "Username indisponível, escolha outro";
    }
}

}
?>