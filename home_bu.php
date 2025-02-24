
<?php


if (!empty($_SESSION["login"]))   
   { ?>

    <?php echo "<div class='c'>";?>
    <?php echo "Olá " . $_SESSION["nome"] . " faz aqui Pesquisa Rápida";  ?>
    <?php include_once('search.php'); ?>



    
    <?php echo "</div>";?>


<?php

} else {  ?>

    <?php echo "<div class='c'>";?>
    <?php echo "O que procuras?";  ?>
    <?php include_once('search.php'); ?>
    <?php echo "</div>";?>


    <h1>Os mais preferidos</h1>
    <?php echo "<div class='listar'>";?> 
    <?php include_once('top_vendas.php'); ?>
    <br>
    <?php echo "</div>";?>
    
    
   
     <?php include_once('categorias.php'); ?>
    
 

     
<?php
}
?>

