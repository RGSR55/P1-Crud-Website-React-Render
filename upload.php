<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript.js"></script>
    <title>Gestão</title>
    <style>
        .caixa {
            float: left;
            width: 170px;
            height: 250px;
            margin: 10px;
            overflow: hidden;
            border: black 1px solid;
            text-align: center;
        }

        .foto {
            width: 100px;
            height: 150px;
            margin-bottom: 10px;
            border: 1px solid black;
        }

        .foto img {
            width: 100%;
            height: 100%;
        }

        .botoes {
            width: 25px;
            height: 25px;
            
        }

        input {
            width: 300px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
   
    include("config.php");


    ### Editar 

    $botao  = 'Enviar';
    $idutilizador = $login = $nome = $foto = '';

    if (isset($_GET['e'])) {
        $idutilizador = $_GET['e'];

        $sql = 'SELECT * FROM utilizador WHERE idutilizador = ' . $idutilizador;
        $resultado = mysqli_query($conn, $sql);
        
        $linha = mysqli_fetch_array($resultado);


        $login = $linha['login'];
        $password = $linha['password'];
        $nome = $linha['nome'];
        $foto = $linha['foto'];
        $botao  = 'Editar';

        
    }
    ?>

    <div class="container3">
    <form action="index.php?opcao=upload" method="post" enctype="multipart/form-data">
        <p><input type="hidden" name="idutilizador" value="<?php print $idutilizador; ?>"></p>
        <p><input type="hidden" name="bdfoto" value="<?php print $foto; ?>"></p>

        <p>Nome <input type="text" name="nome" value="<?php print $nome; ?>"></p>
        <p>Login <input type="text" name="login" value="<?php print $login; ?>"></p>
        <p>Password <input type="text" name="password" value="<?php print $password; ?>"></p>
        <p>Foto <input type="file" name="foto" value="<?php print $foto; ?>"></p>

        <p><input type="submit" value="<?php print $botao; ?>"></p>
    </form>
    </div>

    <?php
    print '<hr>';

    $pasta = 'C:\xampp\htdocs\Projeto_Final_Rui_Rosa\\';
    $nome = $foto_nome = $foto_temp = '';
    $idutilizador = $nome = $foto = $bdfoto = $login = $admin = '';

   
    if (isset($_POST['nome'])) {
        $idutilizador = $_POST['idutilizador'];
        $bdfoto = $_POST['bdfoto'];
        $nome   = $_POST['nome'];
        $login   = $_POST['login'];
        $password   = $_POST['password'];


    }

    if (isset($_FILES['foto']) and !empty($_FILES['foto']['name'])) {
        $foto_nome = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];

        // print $novo_nome = md5($foto_nome . rand(0, 1000)) . '.png';

        $novo_nome=$foto_nome;
        // print '<p>Arquivo: ' . $foto_nome . '</p>';
        // print '<pre>';
        // print_r($_FILES);
        // print '</pre>';
    }

    

    if (!empty($nome)) {

        if (empty($idutilizador)) {
            $sql = 'INSERT INTO utilizador (login, password, nome, admin, foto) VALUES ("' . $login . '", "' . $password . '","' . $nome . '","' . $admin . '","' . $novo_nome . '");';
        } else {
            if (empty($foto_nome)) {
                $novo_nome = $bdfoto;
            }
            $sql = 'UPDATE utilizador SET login = "' . $login . '", password = "' . $password . '", nome = "' . $nome . '", foto = "' . $novo_nome . '" WHERE idutilizador = ' . $idutilizador;
        }

        mysqli_query($conn, $sql);
        move_uploaded_file($foto_temp, $pasta . $novo_nome);
        
    }

    

    if (isset($_GET['a'])) {
        $idutilizador = $_GET['a'];
        $sql = 'DELETE FROM utilizador WHERE idutilizador = ' . $idutilizador;

        echo $sql;
        mysqli_query($conn, $sql);
    }


   

    $sql = 'SELECT * FROM utilizador ORDER BY idutilizador DESC';

    
    $resultado = mysqli_query($conn, $sql);
   
    while ($linha = mysqli_fetch_array($resultado)) {

        // if($linha['admin']!= 1){
        // print '</div>';
        // print'<div class="caixa">';
        // print '<h3>'.$linha['nome'].'</h3>';
        // print'<hr>';

        print '<div class="caixa">';
        print '<div class="foto"><img src="' . $linha['foto'] . '" alt=""></div>';
        print $linha['nome'];


        print '<p>
                            <img src="apagar.jpg" alt="" class="botoes" style="cursor:pointer" onclick="confirmar(' . $linha['idutilizador'] . ')">
                            <a href="index.php?opcao=upload&e=' . $linha['idutilizador'] . '"><img src="editar.jpg" alt="" class="botoes"></a>
                       </p>';
        print '</div>';
    }

    // <a href="upload.php?e='
    
    ?>
    
</body>

</html>