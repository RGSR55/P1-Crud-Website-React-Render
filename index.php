<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <script src="javascript.js"></script>
    <title>Loja</title>


</head>

<body onload="janela()" onresize="janela()">
    <div class="back">

        <header>
            <nav>
                <div class="logo">
                    SUPLEMENTOS ONLINE
                </div>

                <?php
                if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)   
                { ?>
                    <?php include_once('menu_admin.php'); ?>


                <?php
                } else if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 0)   
                { ?>
                    <?php include_once('menu_user.php'); ?>
                    

                <?php

                } else {  ?>

                    <?php include_once('menu_sem_login.php'); ?>
                   

                <?php
                }
                ?>


            

            </nav>


        </header>

        <main>
            <hr>
            <?php

            if (!empty($_GET["opcao"]) && $_GET["opcao"] != "index") {
                include($_GET["opcao"] . ".php");
            } else {
                include("home.php");

            }

            ?>

    


        </main>

        <footer>
        <?php include_once('fundo.php'); ?>
        </footer>

    </div>

    <script>janela()</script>

</body>

</html>