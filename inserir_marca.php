<div class=container>
    <form method="post" enctype="multipart/form-data">
        <h3>Nova Marca</h3>
        <input type="text" name="marca" required>
        <p>Imagem:<input type="file" name="image"></p>
        <button>adicionar</button>
    </form>
</div>

<?php


if ($_POST) {

    $imagem = "null";

    if ($_FILES["image"]["error"] == 0) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $_FILES["image"]["name"]);
        $imagem = "'img/" . $_FILES["image"]["name"] . "'";
    }

    include("config.php");
    $marca = $_POST["marca"];

    if (!empty($_POST["marca"])) {



        $sql = "insert into marca(marca, imagem) values('$marca', $imagem)";
        //echo "<hr>$sql<hr>";


        $conn->query($sql); //objeto ->metodo (comando)

        if ($conn->affected_rows == 1)
            echo "<p>Marca <b>$marca</b> inserida com sucesso!</p>";

        $conn->close();
    }
}
?>