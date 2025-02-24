<div class=container>
    <form method="post" enctype="multipart/form-data">
        <h3>Nova Categoria</h3>
        <input type="text" name="categoria" required>
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

    $categoria = $_POST["categoria"];

    if (!empty($_POST["categoria"])) {

        $sql = "insert into categoria(categoria, imagem) values('$categoria', $imagem)";

        $conn->query($sql);

        if ($conn->affected_rows == 1)
            echo "<p>Categoria <b>$categoria</b> inserida com sucesso!</p>";

        $conn->close();
    }
}
?>